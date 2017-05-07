var queue = [];

// Preload loading icon
var loadImg = new Image();
loadImg.src = window.assetPath +'img/loading.gif';

$( document ).ready(function(){
    $(".button-collapse").sideNav();
    $('select').material_select();
    if(document.location.hash == ""){
        document.location.hash = 'done';
    }
    setInterval(checkHash, 1000);

    $("#click").click(function () {
        $("#donation").toggle();
    });

    $("#post2").click();
    arvutaPäev();


      // jQuey's submit function applied on form.
});

function loadSelectableTasks(){
    var hash = 'done';
    if(document.getElementById('switch').checked == true){
        hash = 'undone'
    }
    document.location.hash = hash;
    checkHash();
}

var recentHash = "";
var checkHash = function() {
    var hash = document.location.hash;
    if (hash) {
        hash = hash.substr(1);
        if (hash == recentHash) {
            return;
        }
        recentHash = hash;
        loadPage(hash);
    }
};

function loadPage(hash) {
    if(hash == 'done'){
        $.ajax({
            url:'/index.php/Tasks/show_tasks_done',
            complete: function (response) {
                $('#showsSelectableTasks').html(response.responseText);
                // false on done tasks
                $("#switch").prop('checked', false);
            },
            error: function (response) {
                console.log(response.responseText);
            }
        });
    }
    else{
        $.ajax({
            url:'/index.php/Tasks/show_tasks_undone_and_past',
            complete: function (response) {
                $('#showsSelectableTasks').html(response.responseText);
                // true on undone tasks
                $("#switch").prop('checked', true);
            },
            error: function (response) {
                //console.log(response.responseText);
                console.log("error")
            }
        });
    }
}

function fblogin() {
    FB.login(function (response) {
        if (response.status === 'connected'){
            var accessToken = response.authResponse.accessToken;
            var request = new XMLHttpRequest();

            request.addEventListener('load', function () {
                var responseFromServer = JSON.parse(this.responseText);

                if (responseFromServer.success){
                    window.location.href = '/index.php/tasks';
                }
                else {
                    document.querySelector("#fb_login_error").textContent=responseFromServer.message;
                }
            });


            request.open('POST', '/index.php/login/fb');
            request.setRequestHeader('Content-type', 'application/json');

            var json = JSON.stringify({token : accessToken}); // token on key, mis peab matchima .php's kasutatavaga ja accessToken on siis value, mis peab matchima fb saadud access tokeniga
            request.send(json);
        }
    }, {scope: 'email'});
}

//eemaldab taskile klikkimisel selle taski
function checkTask(task_id) {
    var p = $('#'+task_id).closest('p');
    p[0].innerHTML = '<img src="' + loadImg.src + '"/>';
    queue.push({
        'taskId':task_id,
        'onSuccess': function () {
            p[0].innerHTML = "<span class = done>"+window.lang.done+"</span>";
            p.fadeOut(400, function () {
                $(this).fadeOut();
            });
        }
    });
    process_queue();
}


function process_queue() {
    if (queue.length===0){
        return;
    }
    var firstTask = queue[0];
    $.ajax({
        url:'/index.php/Tasks/markTaskDone/'+firstTask.taskId,
        success: function () {
            queue.splice(0,1);
            firstTask.onSuccess();
            process_queue();
        },
        error: function (response) {
            setTimeout(process_queue, 500);
            console.error(response.responseText);
        }
    });
}

function unCheckTask(task_id) {
    $.ajax({
        url:'/index.php/Tasks/markTaskUndone/'+task_id,
        complete: function (response) {
            var p = $('#'+task_id).closest('p');
            p[0].innerHTML = "<span class = done>"+window.lang.undone+"</span>";
            p.fadeOut(400, function () {
                $(this).fadeOut();
            });
        },
        error: function (response) {
            console.log(response.responseText);
        }
    });

}

function deleteTask(task_id) {
    $.ajax({
        url:'/index.php/Tasks/delete/'+task_id,
        complete: function (response) {
            var p = $('#'+task_id).closest('p');
            p.fadeOut(400, function () {
                $(this).fadeOut();
            });
        },
        error: function (response) {
            console.log(response.responseText);
        }
    });
}

var checkPassword = function() {
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password2');

    if (pass1.value == pass2.value) {
        $(pass2).css("color", "#66cc66");
    } else {
        $(pass2).css("color", "#ff6666");
    }
};


//arvutab progress bari väärtused ja lisab need vaatesse
function arvutaPäev() {
    var x = $('#points').text();
    var progress_x =  x * 0.25 + 50;
    $('#progressiriba').css({'width': progress_x+'%'});
}

//kui kasutajal on rohkem punkte kui 200
function award() {
    alert("Yo");
}


function myMap() {

    /*
     adds google map in to the pets tab with a marker and info button
     */

    var myCenter = new google.maps.LatLng(58.378991, 26.714598);
    var elephantLoc = new google.maps.LatLng(58.378189, 26.714668);

    var mapProp = {center:myCenter, zoom:16};
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
        position: elephantLoc,
        animation: google.maps.Animation.BOUNCE,
        icon: "../../../asset/img/elephant.png"
    });
    marker.setMap(map);

    google.maps.event.addListener(marker,'click', function() {
        var messageWindow = new google.maps.InfoWindow({content:window.lang.hello});
        messageWindow.open(map,marker);});
}

/*
 shows and hides the form for inserting new task
 */
function showNewTask(newTask) {
    document.getElementById(newTask).style.display = "block";
}

function hideNewTask(newTask) {
    document.getElementById(newTask).style.display = "none";
}
function addTask() {
    hideNewTask('newTask');
}


$(window).scroll(function() {
    //console.log($(window).scrollTop() + ' ' + $(window).height() + ' ' + $(document).height());
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        //if($(document).height() - $(window).scrollTop() <= 900){
        loadMore();
    }
});

var start = 0;
var offset = 900;

function loadMore() {
    s = start;
    $.ajax({
        type: "POST",
        dataType: "json",
        url:'/index.php/Pets/show_pets/'+s,
        success: function (response) {
            $.each(response, function(index, el) {
                $('#petDiv').append(
                    '<div class="row">'+
                    '<div class="col s4"><div>' + el.name + '</div></div>'+
                    '<div class="col s4"><div>' + el.description + '</div></div>'+
                    '<div class="col s4"><div><img alt="sheep" src="' + window.location.origin + '/asset/img/' + el.imgname + '"></div></div>'+
                    '</div>'
                )
            });
        },
        error: function () {
            console.log("error");
        }
    }).done();{
        start += 3;
    }
}

// got help from https://github.com/panique/php-long-polling
function recentFunction(container, lastDate){
    var lastDate = "";

    return $.ajax({
        type: "POST",
        url: "/index.php/Tasks/superTasks",
        cache: false,
        data: { 'request': 'recent',
            'param': lastDate },
        dataType: "json",
        success: function(data){
            if(data != null){
                document.getElementById("dataPush").innerHTML = data;
            }
        },
        complete: function(){
            setTimeout(function(){recentFunction(container, lastDate)}, 7000);
        }
    });
}

function setPoints(container, lastDate){
    var lastDate = "";

    return $.ajax({
        type: "POST",
        url: "/index.php/Tasks/userPoints",
        cache: false,
        data: { 'request': 'recent',
            'param': lastDate },
        dataType: "json",
        success: function(data){
            if(data != null){
                document.getElementById("points").innerHTML = data;
            }
        },
        complete: function(){
            setTimeout(function(){setPoints(container, lastDate)}, 7000);
        }
    });
}
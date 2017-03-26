var queue = [];

// Preload loading icon
var loadImg = new Image();
loadImg.src = window.assetPath +'img/loading.gif';

$( document ).ready(function(){
    $(".button-collapse").sideNav();
    $('select').material_select();

});

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
            console.log('success');
            p[0].innerHTML = "<span class = done>"+window.lang.done+"</span>";
            p.fadeOut(400, function () {
                $(this).fadeOut();
            });
        }
    });

    process_queue();


}
function process_queue() {
    console.log('Processing', queue.length);    //TODO remove this line
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


var checkPassword = function() {
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password2');

    if (pass1.value == pass2.value) {
        $(pass2).css("color", "#66cc66");
    } else {
        $(pass2).css("color", "#ff6666");
    }
}




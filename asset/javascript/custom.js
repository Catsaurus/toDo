$( document ).ready(function(){
    console.log("doc ready");
    $(".button-collapse").sideNav();

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
    console.log(task_id);
    console.log('p');


    $.ajax({
        url:'/index.php/Tasks/markTaskDone/'+task_id,
        complete: function (response) {
            console.log(response.responseText);
            var p = $('#'+task_id).closest('p');
            p[0].innerHTML = "<span class = done>"+window.lang.done+"</span>";
            p.fadeOut(400, function () {
                $(this).fadeOut();
            });
        },
        error: function (response) {
            console.log(response.responseText);
        }
    });

}

const checkPassword = function() {
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password2');

    if (pass1.value == pass2.value) {
        $(pass2).css("color", "#66cc66");
    } else {
        $(pass2).css("color", "#ff6666");
    }
}




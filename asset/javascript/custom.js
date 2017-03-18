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
                    document.querySelector("#fb_login_error").textContent="Facebook authentication failed";
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

    var p = $('#'+task_id).closest('p');
    p[0].innerHTML = "<span class = done>Task done</span>";
    p.fadeOut(400, function () {
        $(this).fadeOut();
    });

    //('input[type = checkbox]').click(function(){
            //$("#"+task_id).closest('p').fadeOut();
    //});

}
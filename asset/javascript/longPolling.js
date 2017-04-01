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
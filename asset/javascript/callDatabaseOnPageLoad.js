
window.onload = function callDatabase (){

    $.ajax({
        url:'/index.php/Tasks/show_tasks_today',
        complete: function (response) {
            $('#tasksOfToday').html(response.responseText);
        },
        error: function () {
            $('#tasksOfToday').html(window.lang.error);
        }
    });

    $.ajax({
        url:'/index.php/Tasks/show_tasks_week',
        complete: function (response) {
            $('#tasksOfThisWeek').html(response.responseText);
        },
        error: function () {
            $('#tasksOfThisWeek').html(window.lang.error);
        }
    });

    $.ajax({
        url:'/index.php/Tasks/show_tasks_future',
        complete: function (response) {
            $('#futureTasks').html(response.responseText);
        },
        error: function () {
            $('#futureTasks').html(window.lang.error);
        }
    });
};



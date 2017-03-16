
window.onload = function callDatabase (){

    $.ajax({
        url:'show_tasks_today',
        complete: function (response) {
            $('#tasksOfToday').html(response.responseText);
        },
        error: function () {
            $('#tasksOfToday').html('error!');
        }
    });

    $.ajax({
        url:'show_tasks_week',
        complete: function (response) {
            $('#tasksOfThisWeek').html(response.responseText);
        },
        error: function () {
            $('#tasksOfThisWeek').html('error!');
        }
    });

    $.ajax({
        url:'show_tasks_future',
        complete: function (response) {
            $('#futureTasks').html(response.responseText);
        },
        error: function () {
            $('#futureTasks').html('error!');
        }
    });
};



/**
 * Created by Riana on 06.03.17.
 */

function showNewTask(newTask) {
    document.getElementById(newTask).style.display = "block";
}

function hideNewTask(newTask) {
    document.getElementById(newTask).style.display = "none";
}
function addTask() {

    var formObj = {};
    var inputs = $('#newTaskForm').serializeArray();

    $.each(inputs, function (i, input) {
        formObj[input.name] = input.value;
        console.log(input.name + " " + input.value);
    });

    //document.getElementById('tasksOfToday').innerHTML = formObj['description'] + " " + formObj['groupRepeat'] + " " + formObj['date'];
}

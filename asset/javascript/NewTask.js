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
    hideNewTask('newTask');
}

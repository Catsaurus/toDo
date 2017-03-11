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

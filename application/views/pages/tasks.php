
<main>

    <div class="container">

        <h1>Tasks</h1>

        <a class="waves-effect waves-teal btn-flat" onclick="showNewTask('newTask')">Add new task</a>
        <div class="row" id="newTask">
            <form id="newTaskForm" class="col s12" method="post" action="<?php echo site_url('Tasks/insert') ?>">
                <div class="row">
                    <div class="input-field col s12">
                        <input name="description" id="description" type="text">
                        <label for="description">Description</label>
                    </div>
                </div>

                <fieldset class="radiogroup">
                    <legend>Select repeat</legend>
                    <ul class="radio">
                        <li><input name="groupRepeat" type="radio" id="daily" value="daily"/><label for="daily">Daily</label></li>
                        <li><input name="groupRepeat" type="radio" id="weekly" value="weekly"/><label for="weekly">Weekly</label></li>
                        <li><input name="groupRepeat" type="radio" id="norepeat" value="norepeat" checked="checked"/><label for="norepeat">No Repeat</label></li>
                    </ul>
                </fieldset>

                <label for="datepicker"> Due date </label>
                    <input name="date" width="50%" type="date" value="<?php echo date('Y-m-d');?>" id="datepicker" class="datepicker">


                <a class="waves-effect waves-teal btn-flat" onclick="hideNewTask('newTask')">Cancel</a>
                <input type="submit" name="submit" value="Add" onclick="hideNewTask('newTask')" class="waves-effect waves-teal btn-flat"/>
            </form>
        </div>

        <p></p>

        <div class="row" id="taskid">
            <div class="col s4">
                <p>Due date on täna</p>
                <div id="tasksOfToday">
                    <table>
                    </table>
                </div>
            </div>
            <div class="col s4">
                <p>Due date on sellel nädalal</p>
                <div id="tasksOfThisWeek">
                    <table>
                    </table>
                </div>
            </div>
            <div class="col s4">
                <p>Due date on kunagi tulevikus</p>
                <div id="futureTasks">
                    <table>
                    </table>
                </div>
            </div>
        </div>

    </div>

</main>
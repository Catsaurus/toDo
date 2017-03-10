
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

                <p><input name="groupRepeat" type="radio" id="daily" value="daily"/>
                    <label for="daily">Daily</label></p>
                <p><input name="groupRepeat" type="radio" id="weekly" value="weekly"/>
                    <label for="weekly">Weekly</label></p>
                <p><input name="groupRepeat" type="radio" id="norepeat" value="norepeat" checked="checked"/>
                    <label for="norepeat">No Repeat</label></p>

                <label> Due date
                    <input name="date" width="50%" type="date" value="<?php echo date('Y-m-d');?>" id="datepicker" class="datepicker">
                </label>

                <a class="waves-effect waves-teal btn-flat" onclick="hideNewTask('newTask')">Cancel</a>
                <input type="submit" name="submit" value="Add" onclick="hideNewTask('newTask')" class="waves-effect waves-teal btn-flat"/>
            </form>
        </div>

        <p></p>

        <div class="row" id="taskid">
            <div class="col s4">
                <p>Due date on täna</p>
                <p id="tasksOfToday">
                <table><tr><th>Description</th></tr>
                    <script  type="text/javascript">
                        $.post( "<?php echo site_url('Tasks/show_tasks') ?>", function( data ) {
                            $("#tasksOfToday").html(data);
                        });
                    </script>
                    </table>
                </p>
            </div>
            <div class="col s4">
                <p>Due date on sellel nädalal</p>
            </div>
            <div class="col s4">
                <p>Due date on kunagi tulevikus</p>
            </div>
        </div>

    </div>

</main>
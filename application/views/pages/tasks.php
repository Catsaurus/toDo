
<main>

    <div class="container">

                <h3><?php echo lang('tasks') ?></h3>

                <a class="waves-effect waves-teal btn-flat" onclick="showNewTask('newTask')"><?php echo lang('add_new') ?></a>

        <div class="tooltip" id="src3div">
            <img src="<?php echo base_url("asset/img/lightbulb_on.png"); ?>" id="s3src" alt="??">
            <span class="tooltiptext" id="s3"><?php echo lang('add_info') ?></span>
        </div>

                <div>
                <p> <?php echo lang('user_tasks'), $taskCount?> </p>
                </div>

                    <div class="row" id="newTask">
                    <form id="newTaskForm" class="col s12" method="post" action="<?php echo site_url('Tasks/insert') ?>">

                        <div class="row">
                            <div class="input-field col s6">
                                <input name="description" id="description" type="text">
                                <label for="description"><?php echo lang('description') ?></label>
                            </div>
                    </div>

                <label for="datepicker"><?php echo lang('due') ?></label>
                    <input name="date" width="50%" type="date" value="<?php echo date('Y-m-d');?>" id="datepicker" class="datepicker">

                        <fieldset class="radiogroup">
                            <legend><?php lang('repeat') ?></legend>
                            <ul class="radio">
                                <li><input name="groupRepeat" type="radio" id="daily" value="daily"/><label for="daily"><?php echo lang('daily') ?></label></li>
                                <li><input name="groupRepeat" type="radio" id="weekly" value="weekly"/><label for="weekly"><?php echo lang('weekly') ?></label></li>
                                <li><input name="groupRepeat" type="radio" id="norepeat" value="norepeat" checked="checked"/><label for="norepeat"><?php echo lang('no_repeat') ?></label></li>
                            </ul>
                        </fieldset>

                <a class="waves-effect waves-teal btn-flat" onclick="hideNewTask('newTask')"><?php echo lang('cancel') ?></a>
                <input type="submit" name="submit" value="Add" onclick="hideNewTask('newTask')" class="waves-effect waves-teal btn-flat"/>
            </form>
        </div>

        <p></p>

        <div class="row" id="taskid" >
            <div class="col s3">
                <p><?php echo lang('due_today') ?></p>
                <div id="tasksOfToday" >
                    <?php foreach ($todayTasks as $task): ?>
                        <p>
                            <input onclick=checkTask(<?php echo $task['id'];?>) type='checkbox' class='filled-in checkbox-red' id='<?php echo $task['id'];?>'>
                            <label for='<?php echo $task['id'];?>'><?php echo $task['content'];?></label>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col s3">
                <p><?php echo lang('due_week') ?></p>
                <div id="tasksOfThisWeek">
                    <?php foreach ($weekTasks as $task): ?>
                        <p>
                            <input onclick=checkTask(<?php echo $task['id'];?>) type='checkbox' class='filled-in checkbox-red' id='<?php echo $task['id'];?>'>
                            <label for='<?php echo $task['id'];?>'><?php echo $task['content'] . ' ' .  $task['date'];?></label>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col s3">
                <p><?php echo lang('due_later') ?></p>
                <div id="futureTasks">
                    <?php foreach ($futureTasks as $task): ?>
                        <p>
                            <input onclick=checkTask(<?php echo $task['id'];?>) type='checkbox' class='filled-in checkbox-red' id='<?php echo $task['id'];?>'>
                            <label for='<?php echo $task['id'];?>'><?php echo $task['content'] . ' ' .  $task['date'];?></label>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col s3">
                <div class="selectable">
                    <div class="switch" onchange="loadSelectableTasks()">
                        <label>
                            <?php echo lang('done_tasks') ?>
                            <input id="switch" type="checkbox">
                            <span class="lever"></span>
                            <?php echo lang('undone_tasks') ?>
                        </label>
                    </div>
                </div>
                <div id="showsSelectableTasks">
                </div>
            </div>
        </div>

        <div class="tooltip" id="src1div">
            <p id="dataPush"></p><script>recentFunction()</script>
            <span class="tooltiptext" id="s1"><?php echo lang('long_polling') ?></span>
        </div>
    </div>

</main>
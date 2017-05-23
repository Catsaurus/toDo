
<main>

    <div class="container">
    <br>

    <div class="row">
        <div class="col s12 m9 l9">
                <a class="waves-effect btn" onclick="showNewTask('newTask')"><i class="material-icons">add</i></a>
                <div class="tooltip" id="src3div">
                    <img src="<?php echo base_url("asset/img/lightbulb_on.png"); ?>" id="s3src" alt="??">
                    <span class="tooltiptext" id="s3"><?php echo lang('add_info') ?></span>
                </div>

                <?php echo validation_errors(); ?>

                <div>
                    <?php
                    if ($taskCount == 0) {
                        echo "<p></p>";
                    }
                    else{
                        echo "<p>";
                        echo lang('user_tasks'), $taskCount;
                        echo "</p>";
                    }
                    ?>
                </div>

            <div class="col s12 m12 l12">
                    <div id="newTask">
                    <form id="newTaskForm" method="post" action="<?php echo site_url('Tasks/insert') ?>">
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input name="description" id="description" type="text">
                                <label for="description"><?php echo lang('description') ?></label>
                            </div>
                        </div>

                        <label for="datepicker"><?php echo lang('due') ?></label>
                        <input name="date" type="date" value="<?php echo date('Y-m-d');?>" id="datepicker" class="datepicker">

                        <fieldset class="radiogroup">
                            <legend><?php lang('repeat') ?></legend>
                            <ul class="radio">
                                <li><input name="groupRepeat" type="radio" id="daily" value="1"/><label for="daily"><?php echo lang('daily') ?></label></li>
                                <li><input name="groupRepeat" type="radio" id="weekly" value="7"/><label for="weekly"><?php echo lang('weekly') ?></label></li>
                                <li><input name="groupRepeat" type="radio" id="norepeat" value="0" checked="checked"/><label for="norepeat"><?php echo lang('no_repeat') ?></label></li>
                            </ul>
                        </fieldset>

                        <a class="waves-effect btn-flat" onclick="hideNewTask('newTask')"><?php echo lang('cancel') ?></a>
                        <input type="submit" name="submit" value="Add" onclick="hideNewTask('newTask')" class="waves-effect btn-flat"/>
                    </form>
                    </div>


        <div class="row" id="taskid" >
            <div class="col s12 m4 l4">
                <?php
                if (count($todayTasks) == 0) {
                    echo "<p></p>";
                }
                 else{
                     echo "<p>";
                    echo lang('due_today');
                    echo "</p>";
                }
                ?>
                <div id="tasksOfToday" >
                    <?php foreach ($todayTasks as $task): ?>
                        <p>
                            <span onclick=deleteTask(<?php echo $task['id'];?>) class='deleteX'><i class="material-icons">clear</i></span>
                            <input onclick="checkTask(<?php echo $task['id'];?>)" type='checkbox' class='filled-in checkbox-red' id='<?php echo $task['id'];?>'>
                            <label for='<?php echo $task['id'];?>'><?php echo htmlspecialchars($task['content']);?></label>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <?php
                if (count($weekTasks) == 0) {
                    echo "<p></p>";
                }
                else{
                    echo "<p>";
                    echo lang('due_week');
                    echo "</p>";
                }
                ?>
                <div id="tasksOfThisWeek">
                    <?php foreach ($weekTasks as $task): ?>
                        <p>
                            <span onclick=deleteTask(<?php echo $task['id'];?>) class='deleteX'><i class="material-icons">clear</i></span>
                            <input onclick="checkTask(<?php echo $task['id'];?>); calculateDay();" type='checkbox' class='filled-in checkbox-red' id='<?php echo $task['id'];?>'>
                            <label for='<?php echo $task['id'];?>'><?php echo htmlspecialchars($task['content']) . ' ' .  $task['date'];?></label>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <?php
                if (count($futureTasks) == 0) {
                    echo "<p></p>";
                }
                else{
                    echo "<p>";
                    echo lang('due_later');
                    echo "</p>";
                }
                ?>
                <div id="futureTasks">
                    <?php foreach ($futureTasks as $task): ?>
                        <p>
                            <span onclick=deleteTask(<?php echo $task['id'];?>) class='deleteX'><i class="material-icons">clear</i></span>
                            <input onclick="checkTask(<?php echo $task['id'];?>); calculateDay()" type='checkbox' class='filled-in checkbox-red' id='<?php echo $task['id'];?>'>
                            <label for='<?php echo $task['id'];?>'><?php echo htmlspecialchars($task['content']) . ' ' .  $task['date'];?></label>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
            </div>
        </div>

                    <div class="col s12 m3 l3">
                        <?php foreach($pet1 as $pet):?>
                        <div class="row">
                            <object type="image/svg+xml"
                                    <?php $img =$pet['imgname']; ?>
                                    data = "<?php echo base_url("asset/img/".$img)?>">
                                    Your browser does not support SVG
                            </object>
                        </div>
                        <?php endforeach; ?>
                        <div class="row">
                                <div id="userPoints">
                                    <script>setPoints()</script>
                                    <div id="points"></div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="progress" >
                                <div class="determinate" id="progressiriba"></div>
                            </div>
                        </div>

                        <div>
                            <p> <?php echo lang($userPointsInformation)?> </p>
                            <p id="newpetbutton"></p>
                        </div>

                        <div class="row">
                            <div class="col s12 hide-on-small-only">
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
                                <div id="showsSelectableTasks"></div>
                            </div>
                        </div>
                    </div>
        </div>

        <!--<div class="row" id="superUserTaskid">
            <div class="col s12">
                <p><?php /*echo lang('tasks_by_superUser') */?></p>
                <div>
                    <p id="dataPush"></p><script>recentFunction()</script>
                </div>
            </div>
        </div>-->

<!--        <div class="tooltip" id="src1div">-->
<!--            <p id="dataPush"></p><script>recentFunction()</script>-->
<!--            <span class="tooltiptext" id="s1">--><?php //echo lang('long_polling') ?><!--</span>-->
<!--        </div>-->

    </div>
</main>

<main>
    <div class="container">
        <div class="row">
            <div>
                <a href="<?php echo site_url('Tasks/index'); ?>">Tasks</a>
                <a href="<?php echo site_url('Pets/index'); ?>">Pets</a>
                <a href="<?php echo site_url('About/index'); ?>">About</a>
                <a href="<?php echo site_url('Settings/index'); ?>">Settings</a>
            </div>
        </div>
        <h1>Tasks</h1>

        <a class="waves-effect waves-teal btn-flat" onclick="showNewTask('newTask')">Add new task</a>

        <div class="row" id="newTask">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="description" type="email" class="validate">
                        <label for="description">Description</label>
                    </div>
                </div>

                <p><input name="groupRepeat" type="radio" id="daily"/>
                    <label for="daily">Daily</label></p>
                <p><input name  ="groupRepeat" type="radio" id="weekly"/>
                    <label for="weekly">Weekly</label></p>
                <p><input name="groupRepeat" type="radio" id="norepeat" checked="checked"/>
                    <label for="norepeat">No Repeat</label></p>

                <label> Due date
                    <input width="50%" type="date" id="date" class="datepicker">
                </label>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>
        </div>
    </div>
</main>
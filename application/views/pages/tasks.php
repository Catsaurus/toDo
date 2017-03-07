
<main>

    <div class="container">

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

                <a class="waves-effect waves-teal btn-flat" onclick="hideNewTask('newTask')">Cancel</a>
                <a class="waves-effect waves-teal btn-flat" onclick="">Add<i class="material-icons right">send</i></a>
            </form>
        </div>

        <p></p>

        <div class="row" id="taskid">
            <div class="col s4">
                <p>Due date on täna</p>
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
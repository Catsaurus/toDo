<main>
    <div class="container">
        <div class="row">
            <div class="col s12 pealkiri">
                <h2>ToDo</h2>
                <h5>Welcome to toDo to do your todos easier and more fun</h5>
            </div>
        </div>
        <div class = "signupForm">
            <?php echo form_open('pages/signup'); ?>

            <input type="input" name="username"  placeholder="Username" /><br />

            <input type="input" name="pswd" placeholder="Password" /><br />

            <input type="input" name="pswd2" placeholder="Password again" /><br />

            <input type="input" name="email" placeholder="Email" /><br />

            <input type="submit" name="submit" value="Register" class="button"/>

            </form>
    </div>
    </div>
</main>
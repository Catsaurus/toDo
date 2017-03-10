<main>
    <div class="container">
        <div class="row">
            <div class="col s12 pealkiri">
                <h2>ToDo</h2>
                <h5>Welcome to toDo to do your todos easier and more fun</h5>
            </div>
        </div>
        <div class = "signupForm">

            <form method="post" action="<?php echo site_url('Register/index') ?>">

            <input type="text" name="username"  placeholder="Username" /><br />

            <input type="password" name="pswd" placeholder="Password" /><br />

            <input type="password" name="pswd2" placeholder="Password again" /><br />

            <input type="email" name="email" placeholder="Email" /><br />

            <input type="submit" name="submit" value="Register" class="button"/>

            </form>
    </div>
    </div>
</main>
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

                <input type="text" title="Username" name="username"  placeholder="Username" /><br />

                <input type="password" title="Password" name="pswd" placeholder="Password" /><br />

                <input type="password" title="Password again" name="pswd2" placeholder="Password again" /><br />

                <input type="email" title="Email" name="email" placeholder="Email" /><br />

                <input type="submit" title="submit" name="submit" value="Register" class="button"/>

            </form>
    </div>
    </div>
</main>
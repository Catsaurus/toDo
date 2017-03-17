<main>
    <div class="container">
        <div class="row">
            <div class="col s12 pealkiri">
                <h3>ToDo</h3>
                <h4><?php echo lang('intro')?></h4>
            </div>
        </div>
        <?php echo validation_errors(); ?>
        <div class = "signupForm">

            <form method="post" action="<?php echo site_url('Register/index') ?>">

                <input type="text" title="Username" name="username"  placeholder="Username" /><br />

                <input type="password" title="Password" name="pswd" placeholder="Password" /><br />

                <input type="password" title="Password again" name="pswd2" placeholder="Password again" /><br />

                <input type="email" title="Email" name="email" placeholder="Email" /><br />

                <button type="submit" title="submit" name="submit" value="Register" class="col s12 btn btn-large waves-effect">Sign up</button>

            </form>
    </div>
    </div>
</main>
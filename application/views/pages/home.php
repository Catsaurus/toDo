
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 pealkiri">
                    <h2>ToDo</h2>
                    <h5><?php echo lang('intro') ?></h5>
                    <div id = "fb_login_error"></div>
                    <a href="<?php echo site_url('Login/index') ?>" class="waves-effect waves-light btn"><?php echo lang('login') ?></a>
                    <a href="<?php echo site_url('Register/index') ?>" class="waves-effect waves-light btn"><?php echo lang('signup') ?></a>
                    <a onclick="fblogin()" class="waves-effect waves-light btn">Facebook</a>
                </div>

                <div class="col s12">
<!--                    <p>ja siia võiks ka midagi panna</p>-->
                </div>
            </div>
        </div>
    </main>
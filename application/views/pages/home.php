
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 pealkiri">
                    <h3>ToDo</h3>
                    <h4><?php echo lang('intro') ?></h4>
                    <div id = "fb_login_error"></div>
                    <a href="<?php echo site_url('Login/index') ?>" class="waves-effect waves-light btn"><?php echo lang('login') ?></a>
                    <a href="<?php echo site_url('Register/index') ?>" class="waves-effect waves-light btn"><?php echo lang('signup') ?></a>
                    <a onclick="fblogin()" class="waves-effect waves-light btn" id="facebook_button">Facebook</a>
                    <a href="/idlogin" class="waves-effect waves-light btn">ID</a>
                </div>

                <div class="col s12">

                </div>
            </div>
        </div>
    </main>
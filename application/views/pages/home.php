
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 pealkiri">
                    <h3>ToDo</h3>
                    <h4><?php echo lang('intro') ?></h4>
                    <div id = "fb_login_error"></div>
                    <a href="<?php echo site_url('Login/index') ?>" class="btn"><?php echo lang('login') ?></a>
                    <a href="<?php echo site_url('Register/index') ?>" class="btn"><?php echo lang('signup') ?></a>
                    <a onclick="fblogin()" class="waves-effect waves-light btn" id="facebook_button">Facebook</a>
                </div>

                <div class="col s12">
                    <div>

                        <figure>
                            <object type="image/svg+xml"
                                    data = "<?php echo base_url("asset/pets/oc.svg")?>">
                                Your browser does not support SVG
                            </object>
                        </figure>


                    </div>
                </div>
            </div>
        </div>
    </main>
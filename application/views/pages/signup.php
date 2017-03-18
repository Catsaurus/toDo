<main>
    <div class="container">
        <div class="row">
            <div class="col s12 pealkiri">
                <h3>ToDo</h3>
                <h4><?php echo lang('intro')?></h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s3"></div>
            <div class="col s12 m6">
                <div class="z-depth-3 row">
                    <form method="post" action="<?php echo site_url('Register/index') ?>">

                        <div class="row">
                            <div class="col s12"></div>
                        </div>

                        <div class="row">
                            <div class="col s2"></div>
                            <div class="col s8" >
                                <?php echo validation_errors(); ?>

                                <!--KASUTAJANIMI-->
                                <div class="input-field">
                                    <input class="validate" type="text" name="username" id="username">
                                    <label for="username">Username</label>
                                </div>

                                <!--PAROOL-->
                                <div class="input-field">
                                    <input class="validate" type="password" name="pswd" id="password"/>
                                    <label for="password">Password</label>
                                </div>

                                <!--PAROOL UUESTI-->
                                <div class="input-field">
                                <input class="validate" type="password" name="pswd2" id="password2"/>
                                <label for="password2">Password again</label>
                                </div>

                                <!--EMAIL-->
                                <div class="input-field">
                                    <input class="validate" type="email" title="Email" name="email" id="email">
                                    <label for="email">Email</label>
                                </div>

                                <button type="submit" name="submit" class="col s12 btn btn-large waves-effect">Sign up</button>
                            </div>
                        </div>
                        <div class="col s2"></div>
                    </form>
                </div>

        </div>
    </div>
    </div>
</main>
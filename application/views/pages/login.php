
<main>
    <div class="container">
        <div class=" row">
            <div class="col s12 pealkiri">
                <h3>ToDo</h3>
                <h4>Welcome to toDo to do your todods...easier...and more fun</h4>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col s3"></div>
                    <div class="col s12 m6">
                    <!--Z-DEPTH on z telje sügavus, ehk mida suurem on see number, seda kaugemal on see nö taustast-->
                        <div class="z-depth-3 row">

                            <form method="post" action="<?php echo site_url('Login/index'); ?>">

                                <div class="row">
                                    <div class="col s12"></div>
                                </div>

                                <!--KASUTAJANIMI-->
                                <div class="row">
                                    <div class="col s2"></div>
                                    <div class="col s8" >
                                        <?php echo validation_errors(); ?>
                                        <?php echo form_open('Login/index'); ?>

                                        <div class="input-field">
                                            <input class="validate" type="text" name="username" id="username"/>
                                            <label for="username">Your username</label>
                                        </div>
                                        <div class="input-field">
                                            <input class="validate" type="password" name="pswd" id="password"/>
                                            <label for="password">Enter password</label>
                                        </div>
                                            <button type="submit" name="submit" class="col s12 btn btn-large waves-effect">Login</button>

                                        </div>
                                    </div>
                                    <div class="col s2"></div>
                                </div>
                        </form>
                                    <!--FORGOT PASSWORD link-->
                                    <div class="row">
                                        <div class="col s2"></div>
                                        <div class="row col s10">
                                            <label id="forgot_password">
                                                <a href='#'><h5>Forgot Password?</h5></a>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                        </div>
                    </div>

            <div class="section"></div>

</main>
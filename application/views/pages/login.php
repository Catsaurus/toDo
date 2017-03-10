
<main>
    <div class="container">
        <div class=" row">
            <div class="col s12 pealkiri">
                <h2>ToDo</h2>
                <h5>Welcome to toDo to do your todos easier and more fun</h5>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col s3"></div>
                    <div class="col s6">
                    <!--Z-DEPTH on z telje sügavus, ehk mida suurem on see number, seda kaugemal on see nö taustast-->
                        <div class="z-depth-5 row light-green lighten-5">
                            <form class="col s12" method="post">
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
                                    </div>
                                    <div class="col s2"></div>
                                </div>

                                <!--PAROOLI väli-->
                                <div class="row">
                                    <div class="col s2"></div>
                                    <div class="col s8">
                                        <div class="input-field">
                                            <input class="validate" type="password" name="pswd" id="password"/>
                                            <label for="password">Enter password</label>
                                        </div>
                                    </div>
                                    <div class="col s2"></div>


                                    <!--FORGOT PASSWORD link-->
                                    <div class="row">
                                        <div class="col s2"></div>
                                        <div class="row col s10">
                                            <label style='float: right'>
                                                <a class='pink-text' href='#'><b>Forgot Password?</b></a>
                                            </label>
                                        </div>
                                    </div>
                                </div>



                                <!-- LOGIN nupp-->
                                <div class="row">
                                    <div class="col s2"></div>
                                    <div class="col s8">
                                        <button type="submit" name="submit" class="col s12 btn btn-large waves-effect">Login</button>
                                    </div>
                                    <div class=" col s2"></div>
                                </div>
                                <div class="col s3"></div>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="section"></div>
        </div>
    </div>
</main>
<main>
    <div class="container">
        <div class=" row">
            <div class="col s12 pealkiri">
                <h3>ToDo</h3>
                <h4><?php echo lang('intro') ?></h4>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col s3"></div>
                    <div class="col s12 m6">
                    <!--Z-DEPTH on z telje sügavus, ehk mida suurem on see number, seda kaugemal on see nö taustast-->
                        <div class="z-depth-2 row">
			    <div class="row">
                                <div class="col s12">
                                </div>
                            </div>
                                <!--KASUTAJANIMI-->
                            <div class="row">
                                <div class="col s2">
                                </div>
                                <div class="col s8" >
                                    <?php echo validation_errors(); ?>
                                    <?php echo form_open('Login/index'); ?>
                                        <div class="input-field">
                                            <input type="text" name="username" id="username"/>
                                            <label for="username"><?php echo lang('username')?></label>
                                        </div>
                                        <div class="input-field">
                                            <input type="password" name="pswd" id="password"/>
                                            <label for="password"><?php echo lang('password')?></label>
                                        </div>
                                        <button type="submit" name="submit" class="col s12 btn btn-large waves-effect"><?php echo lang('login')?></button>
				    </form>
                                </div>
                            </div>
                            <div class="col s2">
                            </div>
                        </div>                        
                        <!--FORGOT PASSWORD link-->
<!--                                    <div class="row">-->
<!--                                        <div class="col s2"></div>-->
<!--                                        <div class="row col s10">-->
<!--                                            <label id="forgot_password">-->
<!--                                                <a href='#'><h5>Forgot Password?</h5></a>-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                    </div>
                </div>

                <div class="section"></div>
            </div>        

</main>
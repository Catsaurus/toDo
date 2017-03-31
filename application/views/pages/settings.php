
<main>
    <div class="container">
        <div class="col s12">
            <h3><?php echo lang('settings')?></h3>
        </div>

<!--        <div class="tooltip" id="src2div">-->
<!--            <img src="--><?php //echo base_url("asset/img/lightbulb_on.png"); ?><!--" id="s2src">-->
<!--            <span class="tooltiptext" id="s2">--><?php //echo lang('change_data') ?><!--</span>-->
<!--        </div>-->
        <div class="row">
            <div class="col s4">
                <form id = "changePass" method="post" action="<?php echo site_url('Settings/changePassword') ?>">
                    <div class="input-field">
                        <input type="password" name="pswd" id="password">
                        <label for="password"><?php echo lang('password')?></label>
                    </div>
                    <button type="submit" name="submit" class="col s12 btn btn-large waves-effect"><?php echo lang('change_password')?></button>
                </form>
            </div>
            <div class="col s8">
            </div>
        </div>

        <div class="row">
            <div class="col s4">
                <form id = "changeEmail" method="post" action="<?php echo site_url('Settings/changeEmail') ?>">
                    <div class="input-field">
                        <input type="email" title="Email" name="email" id="email">
                        <label for="email"><?php echo lang('email')?></label>
                    </div>
                    <button type="submit" name="submit" class="col s12 btn btn-large waves-effect"><?php echo lang('change_email')?></button>
                </form>
            </div>
            <div class="col s8">

            </div>
        </div>



    </div>
</main>
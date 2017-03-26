
<main>
    <div class="container">

        <h3><?php echo lang('settings')?></h3>
        <p></p>
<!--        <div class="tooltip" id="src2div">-->
<!--            <img src="--><?php //echo base_url("asset/img/lightbulb_on.png"); ?><!--" id="s2src">-->
<!--            <span class="tooltiptext" id="s2">--><?php //echo lang('change_data') ?><!--</span>-->
<!--        </div>-->
        <form id = "changePass" method="post" action="<?php echo site_url('Settings/changePassword') ?>">
        <div class="input-field">
            <input type="password" name="pswd" id="password">
            <label for="password"><?php echo lang('password')?></label>
        </div>
            <button type="submit" name="submit" class="col s12 btn btn-large waves-effect"><?php echo lang('change_password')?></button>
        </form>
        <form id = "changeEmail" method="post" action="<?php echo site_url('Settings/changeEmail') ?>">
            <div class="input-field">
                <input type="email" title="Email" name="email" id="email">
                <label for="email"><?php echo lang('email')?></label>
            </div>
            <button type="submit" name="submit" class="col s12 btn btn-large waves-effect"><?php echo lang('change_email')?></button>
        </form>
    </div>
</main>
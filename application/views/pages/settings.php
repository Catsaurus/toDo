
<main>
    <div class="container">

        <h3>Settings</h3>
        <p></p>
        <div class="tooltip" id="src2div">
            <img src="<?php echo base_url("asset/img/lightbulb_on.png"); ?>" id="s2src">
            <span class="tooltiptext" id="s2"><?php echo lang('change_data') ?></span>
        </div>
        <form id = "changePass" method="post" action="<?php echo site_url('Settings/changePassword') ?>">
        <div class="input-field">
            <input type="password" name="pswd" id="password">
            <label for="password">Password</label>
        </div>
            <button type="submit" name="submit" class="col s12 btn btn-large waves-effect">Change password</button>
        </form>
        <form id = "changeEmail" method="post" action="<?php echo site_url('Settings/changeEmail') ?>">
            <div class="input-field">
                <input type="email" title="Email" name="email" id="email">
                <label for="email">Email</label>
            </div>

            <button type="submit" name="submit" class="col s12 btn btn-large waves-effect">Change email</button>
        </form>
    </div>
</main>
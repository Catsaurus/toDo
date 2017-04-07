
<main>
    <div class="container">

        <div class="col s12">
            <h3><?php echo lang('sitemap')?></h3>
        </div>

        <div class="row" id="center_objects">
            <div class="row">
                <div class="col s3">
                    <ul id="sitemaplinks">
                        <li><a href="<?php echo site_url('Tasks/index') ?>"><?php echo lang('tasks') ?></a></li>
                        <li><a href="<?php echo site_url('Pets/index') ?>"><?php echo lang('pets') ?></a></li>
                        <li><a href="<?php echo site_url('Settings/index') ?>"><?php echo lang('settings') ?></a></li>
                        <li><a href="<?php echo site_url('About/index') ?>"><?php echo lang('about') ?></a></li>
                        <li><a href="<?php echo site_url('Sitemap/index') ?>"><?php echo lang('sitemap') ?></a></li>
                        <li><a href="<?php echo site_url('Logout/index') ?>"><?php echo lang('logout') ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
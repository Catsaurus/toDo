<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html> <!--HTML5 doctype declaration-->
<head>
    <meta charset="UTF-8">
    <title>toDo</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/materialize.css"); ?>"  media="screen,projection"/>

    <!-- custom.css on eraldi css fail, kus on meie lehe värvid and stuff, cause vist nagu ei sobi muuta materialize faile, liiga suur ka selle muutmiseks-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/custom.css"); ?>" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/Stylesheet.css"); ?>"/>
    <!-- javascriptid peaks lõppu tõstma nagu ma aru saan, sest siis on lehe laadimine kiirem, MAP ei tööta, kui sees siit ära kustutada-->
    <script src="<?php echo base_url("asset/javascript/Map.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url("asset/javascript/longPolling.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url("Javascript/lang"); ?>" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url("asset/javascript/PetLoader.js"); ?>"></script>

</head>

<header>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="<?php echo site_url('Tasks/index') ?>" ><?php echo lang('tasks') ?></a></li>
        <li><a href="<?php echo site_url('Pets/index') ?>" ><?php echo lang('pets') ?></a></li>
        <li><a href="<?php echo site_url('Settings/index') ?>" ><?php echo lang('settings') ?></a></li>
        <li><a href="<?php echo site_url('Logout/index')?>"  class="btn"><?php echo lang('logout') ?></a></li>
    </ul>

    <nav>
        <div class="nav-wrapper">
            <a href="<?php echo site_url('Home/index') ?>" class="brand-logo">ToDo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><em class="material-icons"></em></a>
            <ul class="right hide-on-med-and-down">
                <li class="headerLink"><a href="<?php echo site_url('Tasks/index') ?>" ><?php echo lang('tasks') ?></a></li>
                <li class="headerLink"><a href="<?php echo site_url('Pets/index') ?>" ><?php echo lang('pets') ?></a></li>
                <li class="headerLink"><a href="<?php echo site_url('Settings/index') ?>" ><?php echo lang('settings') ?></a></li>
                <li class="headerLink"><a href="<?php echo site_url('Logout/index')?>" ><?php echo lang('logout') ?></a></li>
            </ul>
        </div>
    </nav>

</header>

<body>
<!--    TODO create method so this code is not repeated-->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '268700333572226',
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


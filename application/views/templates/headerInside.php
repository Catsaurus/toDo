<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html> <!--HTML5 doctype declaration-->
<!--<html lang="en">-->
<head>
    <title>toDo</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/materialize.css"); ?>"  media="screen,projection"/>

    <!-- custom.css on eraldi css fail, kus on meie lehe värvid and stuff, cause vist nagu ei sobi muuta materialize faile, liiga suur ka selle muutmiseks-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/custom.css"); ?>" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/Stylesheet.css"); ?>"/>
    <!-- javascriptid peaks lõppu tõstma nagu ma aru saan, sest siis on lehe laadimine kiirem, MAP ei tööta, kui sees siit ära kustutada-->
    <script src="<?php echo base_url("asset/javascript/Map.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url("asset/javascript/callDatabaseOnPageLoad.js"); ?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<header>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="<?php echo site_url('Tasks/index') ?>" >Tasks</a></li>
        <li><a href="<?php echo site_url('Pets/index') ?>" >Pets</a></li>
        <!--<li><a href="<?php echo site_url('About/index') ?>" >About</a></li>-->
        <li><a href="<?php echo site_url('Settings/index') ?>" >Settings</a></li>
        <li><a href="<?php echo site_url('Logout/index')?>"  class="btn">LOG OUT</a></li>
    </ul>

    <nav>
        <div class="nav-wrapper">
            <a href="<?php echo site_url('Home/index') ?>" class="brand-logo">ToDo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><em class="material-icons">menu</em></a>
            <ul class="right hide-on-med-and-down">
                <li class="headerLink"><a href="<?php echo site_url('Tasks/index') ?>" >Tasks</a></li>
                <li class="headerLink"><a href="<?php echo site_url('Pets/index') ?>" >Pets</a></li>
                <!--<li class="headerLink"><a href="<?php echo site_url('About/index') ?>" >About</a></li>-->
                <li class="headerLink"><a href="<?php echo site_url('Settings/index') ?>" >Settings</a></li>
                <li class="headerLink"><a href="<?php echo site_url('Logout/index')?>" >Log out</a></li>
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


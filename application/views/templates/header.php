<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html> <!--HTML5 doctype declaration-->
    <!--<html lang="en">-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">

        <title>ToDo</title>


        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">


        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/materialize.css"); ?>" />


        <!-- custom.css on eraldi css fail, kus on meie lehe värvid and stuff, cause vist nagu ei sobi muuta materialize faile, liiga suur ka selle muutmiseks-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/custom.css"); ?>" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/Stylesheet.css"); ?>"/>
        <!--ikoonid-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- javascriptid peaks lõppu tõstma nagu ma aru saan, sest siis on lehe laadimine kiirem, MAP ei tööta, kui sees siit ära kustutada-->
        <script src="<?php echo site_url("Javascript/lang"); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("asset/javascript/custom.js"); ?>" type="text/javascript"></script>



    </head>
<body>

<header>
    <div class="navbar-fixed z-depth-4">
        <nav>
            <div class="nav-wrapper">
                <a href="<?php echo site_url('Home/index') ?>" class="brand-logo">ToDo</a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo site_url('Login/index') ?>" ><?php echo lang('login') ?></a></li>
                    <li class="headerLink"><a href="<?php echo site_url('Register/index') ?>" ><?php echo lang('signup') ?></a></li>
                </ul>
            </div>
        </nav>

    </div>


</header>

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


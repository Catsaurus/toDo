<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html> <!--HTML5 doctype declaration-->
    <!--<html lang="en">-->
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/materialize.css"); ?>"  media="screen,projection"/>

        <!-- custom.css on eraldi css fail, kus on meie lehe värvid and stuff, cause vist nagu ei sobi muuta materialize faile, liiga suur ka selle muutmiseks-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url("asset/css/custom.css"); ?>" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- javascriptid peaks lõppu tõstma nagu ma aru saan, sest siis on lehe laadimine kiirem-->
        <script src="<?php echo base_url("asset/javascript/Map.js"); ?>" type="text/javascript"></script>


    </head>

<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="<?php echo site_url('pages/index') ?>" class="brand-logo">ToDo</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="headerLink"><a href="<?php echo site_url('pages/login') ?>" >Log in</a></li>
                    <li class="headerLink"><a href="<?php echo site_url('pages/signup') ?>" >SIGN UP</a></li>
                </ul>
            </div>
        </nav>

    </div>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="<?php echo site_url('pages/login') ?>" class="btn" >Log in</a></li>
        <li><a href="<?php echo site_url('pages/signup') ?>"  class="btn">SIGN UP</a></li>
    </ul>

</header>

    <body>


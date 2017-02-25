<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url("asset/css/footer.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("asset/css/Stylesheet.css"); ?>">
    <script type="text/javascript" src="<?php echo base_url("asset/javascript/Map.js"); ?>"></script>
    <meta charset="utf-8">

    <?php $this->load->library('javascript'); ?>
    <?php $this->load->library('javascript/jquery'); ?>

    <title>MAP</title>

</head>
<body>
<h1>Where does my Elephant live?</h1>

<div id="elephantData"></div>
<div id="googleMap"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnbcCUfwLZEDJOeqGm9VRfJSKeqETl40I&callback=myMap"></script>

<em id = "footer" >&copy; 2017</em>

</body>
</html>

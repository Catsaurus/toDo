<?php

class Logout extends CI_Controller {

    public function index()
    {
        $_SESSION = array('site_lang' => $_SESSION['site_lang']);
        unset($_SESSION);
        redirect(site_url('home'));
    }
}
?>
<?php

class Logout extends CI_Controller {

    public function index()
    {
        unset($_SESSION);
        session_destroy();

        view_loader('home');
    }
}
?>
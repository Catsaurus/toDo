<?php

class Logout extends CI_Controller {

    public function index()
    {
        session_start();
        unset($_SESSION);
        session_destroy();
        //$this->lang->load('general', 'estonian');
        $this->lang->load('general', 'english');
        view_loader('home');
    }
}
?>
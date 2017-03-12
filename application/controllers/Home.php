<?php

class Home extends CI_Controller {
    public function index() {
        //$this->lang->load('general', 'estonian');
        $this->lang->load('general', 'english');
        view_loader('home');
    }
}
<?php

class About extends CI_Controller {

    public function index()
    {
        $this->lang->load('general', 'estonian');
        //$this->lang->load('general', 'english');
        session_start();
        $page = 'about';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
}
<?php

class About extends CI_Controller {

    public function index()
    {
        session_start();
        $page = 'about';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
}
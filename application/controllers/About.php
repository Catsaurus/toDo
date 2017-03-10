<?php

class About extends CI_Controller {

    public function index()
    {
        $page = 'about';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
}
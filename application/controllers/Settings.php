<?php

class Settings extends CI_Controller {

    public function index()
    {
        $page = 'settings';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
}
<?php

class Pets extends CI_Controller {

    public function index()
    {
        $page = 'pets';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
}
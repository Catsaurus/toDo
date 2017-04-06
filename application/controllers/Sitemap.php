<?php

class Sitemap extends CI_Controller {

    public function index() {
        $page = 'sitemap';
        $data['title'] = ucfirst($page);
        view_loader($page, $data);
    }

}
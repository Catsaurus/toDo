<?php
/**
 * Created by PhpStorm.
 * User: Riana
 * Date: 06.03.17
 * Time: 18:45
 */

class Pets extends CI_Controller {

    public function index()
    {
        $page = 'pets';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
}
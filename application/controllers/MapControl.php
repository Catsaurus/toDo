<?php
/**
 * Created by PhpStorm.
 * User: Riana
 * Date: 22.02.17
 * Time: 8:39
 */

class MapControl extends CI_Controller {

    public function index()
    {

        $this->load->helper('url');
        $this->load->library('javascript');

        $page = 'map';
        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
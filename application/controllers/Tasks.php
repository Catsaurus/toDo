<?php
/**
 * Created by PhpStorm.
 * User: Riana
 * Date: 06.03.17
 * Time: 18:45
 */

class Tasks extends CI_Controller {

    public function index()
    {
        $page = 'tasks';
        $data['title'] = ucfirst($page);

        $this->load->view('templates/headerInside', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
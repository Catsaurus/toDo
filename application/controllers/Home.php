<?php

class Home extends CI_Controller {
    public function index() {
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            view_loader($page);
        }
        else{
            view_loader('home');
        }
    }
}
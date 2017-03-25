<?php

class Home extends CI_Controller {
    public function index() {

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            redirect(site_url('tasks'));
        }
        else{
            view_loader('home');
        }
    }
}
<?php

class Settings extends CI_Controller {

    public function index()
    {
        $this->lang->load('general', 'english');
        session_start();
        $_SESSION['afterLogIn'] = 'settings';
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'settings';
            $data['title'] = ucfirst($page);
            view_loader($page);
        }
        else{
            view_loader('login');
        }
    }
}
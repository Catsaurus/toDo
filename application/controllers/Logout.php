<?php

class Logout extends CI_Controller {

    public function index()
    {
      	session_destroy();
        redirect(site_url('home'));
    }
}
?>
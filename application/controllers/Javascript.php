<?php
class Javascript extends CI_Controller
{
    public function lang(){
        header('Content-Type: application/javascript');
        $this->load->view('javascript/lang');
    }
}
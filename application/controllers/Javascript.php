<?php
class Javascript extends CI_Controller
{
    public function lang(){
        $this->lang->load('general', 'estonian');
        //$this->lang->load('general', 'english');
        header('Content-Type: application/javascript');
        $this->load->view('javascript/lang');
    }
}
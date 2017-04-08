<?php

class IdLogin extends CI_Controller{
    public function index(){


        if (isset($_SERVER["SSL_CLIENT_S_DN_CN"])){
            $idCardInfo = $_SERVER["SSL_CLIENT_S_DN_CN"];
            $pos = strrpos($idCardInfo, ',');
            $idCode = substr($idCardInfo, $pos+1);
            echo $idCode;
            $email = null;
            if (isset($_SERVER["SSL_CLIENT_SAN_Email_0"])){
                $email = $_SERVER["SSL_CLIENT_SAN_Email_0"];
            }
            $user = $this->user_model->get_user_id($idCode);
            if ($user === null){
                $this->user_model->insert_IDuser($email, $idCode);
                $user = $this->user_model->get_user_id($idCode);
            }
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $user['id'];
            redirect(site_url('tasks'));

        }
        else {
            echo lang('id_fail');
        }
    }
}
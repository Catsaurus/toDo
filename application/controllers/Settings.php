<?php

class Settings extends CI_Controller {

    public function index()
    {
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

    public function changePassword()
    {
        $password = $this->input->post('pswd');
        $id = $_SESSION['id'];
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $result = $this->user_model->change_password($id, $password_hash);
        header("location:index");
    }

    public function changeEmail()
    {
        $email = $this->input->post('email');
        $id = $_SESSION['id'];
        $result = $this->user_model->change_email($id, $email);
        header("location:index");
    }

    public function deleteAccount()
    {
        $id = $_SESSION['id'];
        $this->user_model->delete_user($id);
        redirect(site_url() . "/Logout/index");
    }


}
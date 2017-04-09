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
    public function password_check($oldpassword){
        $user = $this->user_model->get_user($_SESSION['id']);
        if (!password_verify($oldpassword, $user['password_hash'])) {
            $this->form_validation->set_message('password_check', lang('wrong_password'));
            return false;
        }
        else return true;
    }
    public function changePassword()
    {
        $this->form_validation->set_rules('pswd', lang('password'), 'required');
        $this->form_validation->set_rules('oldpswd', lang('oldpassword'), 'required|callback_password_check');
        $this->form_validation->set_rules('pswd2', lang('password_again'), 'required');
        if ($this->form_validation->run() === TRUE) {

            $oldpassword = $this->input->post('oldpswd');
            $password = $this->input->post('pswd');
            $password2 = $this->input->post('pswd2');
            $user = $this->user_model->get_user_from_id($_SESSION['id']);
            $pswd_valid = password_verify ($oldpassword, $user['password_hash']);
            if ($pswd_valid) {
                $id = $_SESSION['id'];
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $result = $this->user_model->change_password($id, $password_hash);
                header("location:index");
            }
            else{
                view_loader('settings');
            }
        }
        else {
            view_loader('settings');
        }
    }

    public function changeEmail()
    {
        $this->form_validation->set_rules('email', lang('email'), 'required');
        if ($this->form_validation->run() === TRUE) {
            $email = $this->input->post('email');
            $id = $_SESSION['id'];
            $result = $this->user_model->change_email($id, $email);
            header("location:index");
        }
        else{
            view_loader('settings');
        }
    }

    public function deleteAccount()
    {
        $id = $_SESSION['id'];
        $this->user_model->delete_user($id);
        redirect(site_url() . "/Logout/index");
    }


}
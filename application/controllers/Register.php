<?php

class Register extends CI_Controller {

    public function username_check($user_name){
        $user = $this->user_model->get_user($user_name);
        //print_r($user);
        if ($user['username'] != null) {
            $this->form_validation->set_message('username_check', lang('account_exists'));
            return false;
        }
        else return true;
    }
    public function index()
    {
        $this->lang->load('general', 'english');
        session_start();
        $this->form_validation->set_rules('username', lang('username'), 'required|callback_username_check');
        $this->form_validation->set_rules('pswd', lang('password'), 'required');
        $this->form_validation->set_rules('pswd2', lang('password_again'), 'required');
        $this->form_validation->set_rules('email', lang('email'), 'required');

        // Don't show this page when already logged in
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            view_loader($page);
        }

        else if ($this->form_validation->run()== true){
            // TODO kontrollida, kas paroolid on ühesugused
            $username = $this->input->post('username');
            $password = $this->input->post('pswd');
            $password2 = $this->input->post('pswd2');
            $email = $this->input->post('email');
            $password_hash = password_hash($password,PASSWORD_DEFAULT);

            $reg = $this->user_model->insert_user($username, $email, $password_hash);
            $_SESSION['id'] = $this->db->insert_id();
            $_SESSION['logged_in'] = true;
            redirect(site_url() . "/Tasks/index");
        }
        else {
            view_loader('signup');

        }
    }
}
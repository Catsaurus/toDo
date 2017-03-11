<?php
/**
 * Created by PhpStorm.
 * User: Riana
 * Date: 09.03.17
 * Time: 16:56
 */
class Login extends CI_Controller {

    public function index() {
        session_start();

        #set rules to check that both login fields have something written in them
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pswd', 'Password', 'required');

        #If both fields have something written
        if ($this->form_validation->run() === TRUE){

            $username = $this->input->post('username');
            $password = $this->input->post('pswd');

            #Get the equivalent data from database
            $user = $this->user_model->get_user($username);

            #Check if the password is correct
            $pswd_valid = password_verify ($password, $user['password_hash']);
            if ($pswd_valid) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                if(isset($_SESSION['afterLogIn'])){
                    $page = $_SESSION['afterLogIn'];
                    $data['title'] = ucfirst($page);
                    view_loader($page);
                }
                else{
                    view_loader('tasks');
                }
                return $pswd_valid;
            }
            else{
                $errorMessage = "Invalid Login";
                // TODO
                $_SESSION['login'] = '';
            }
        }
        view_loader('login');
    }
}
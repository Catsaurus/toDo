<?php

class Register extends CI_Controller {

    public function index()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            view_loader('signup');
        }
        else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['pswd'];
            $email = $_POST['email'];
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            if ($_POST["username"] == "" or $_POST["pswd"] == "" or $_POST["pswd"] != $_POST["pswd2"]) {
                // Something does not match TODO!
                view_loader('signup');
            }
            else {
                $data = array(
                    'username' => $username,
                    'email'  => $email,
                    'password_hash'  => $password_hash
                );
                $this->load->database();
                $reg = $this->db->insert('users', $data); // TODO Model'isse
                if ($reg == 0) {
                    // "that username already exists" TODO
                    $errorMessage = "Invalid";
                    // TODO
                }
                else{
                    $_SESSION['id'] = $this->db->insert_id();
                    view_loader('tasks');
                }
            }
        }
    }
}
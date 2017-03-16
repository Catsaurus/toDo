<?php

class Register extends CI_Controller {

    public function index()
    {
        session_start();

        // Don't show this page when already logged in
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            view_loader($page);
        }

        else{
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
                    // TODO Kontroll, et kui kasutaja on juba olemas, siis mis teha
                    $reg = $this->user_model->insert_user($username, $email, $password_hash);
                    $_SESSION['id'] = $this->db->insert_id();
                    $_SESSION['logged_in'] = true;
                    view_loader('tasks');
                }
            }
        }
    }
}
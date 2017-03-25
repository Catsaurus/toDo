<?php

class Login extends CI_Controller {

    public function index() {

        // Don't show this page when already logged in
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $page = 'tasks';
            $data['title'] = ucfirst($page);
            view_loader($page);
        }

        else{
            #set rules to check that both login fields have something written in them
            $this->form_validation->set_rules('username', lang('username'), 'required');
            $this->form_validation->set_rules('pswd', lang('password'), 'required');

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
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $username;

                    /*
                     * checks if page needs redirecting to the wished one
                    */
                    if(isset($_SESSION['afterLogIn'])){
                        $page = $_SESSION['afterLogIn'];
                        $data['title'] = ucfirst($page);
                        if($page == 'tasks'){
                            redirect(site_url() . "/Tasks/index");
                        }
                        else{
                            view_loader($page);
                        }
                    }
                    else{
                        redirect(site_url() . "/Tasks/index");
                    }
                }
                else{
                    $errorMessage = "Invalid Login";
                    view_loader('login');
                }
            }
            else{
                view_loader('login');
            }
        }

    }
    public function fb(){
        $jsonString = file_get_contents('php://input');
        $obj = json_decode($jsonString);
        $accessToken = $obj->token;
        // read the json that was created in the browser

        $url = 'https://graph.facebook.com/v2.8/me?fields=id,email&access_token=' . $accessToken;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set settings for curl, set url, turn off verification if the request is actually going to fb, turn on return.

        $response = curl_exec($ch);
        $errorno = curl_errno($ch);

        if ($errorno) { // shortcut for "is not 0" or null or undefined etc
            $this->output->set_output(json_encode(array('success' => false, 'message' => lang('fb_login_fail'))));
        }
        else {
            $json = json_decode($response);

            if (isset($json->id)){ // kui jsonis on ID field /key
                $this->output->set_output(json_encode(array('success' => true)));
                $user = $this->user_model->get_user_fb($json->id);
                if ($user === null){
                    $this->user_model->insert_fbuser(@$json->id, $json->email);
                    $user = $this->user_model->get_user_fb($json->id);
                }
                $_SESSION['logged_in'] = true;
                $_SESSION['id'] = $user['id'];
            }
	    else $this->output->set_output(json_encode(array('success' => false, 'message' => lang('fb_login_fail'))));

        }
    }
}
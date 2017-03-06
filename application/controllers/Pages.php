<?php

/**
 * Index Page for this controller.
 *
 * Maps to the following URL
 * 		http://example.com/index.php/welcome
 *	- or -
 * 		http://example.com/index.php/welcome/index
 *	- or -
 * Since this controller is set as the default controller in
 * config/routes.php, it's displayed at http://example.com/
 *
 * So any other public methods not prefixed with an underscore will
 * map to /index.php/welcome/<method_name>
 * @see https://codeigniter.com/user_guide/general/urls.html
 */
class Pages extends CI_Controller {

    #Method to load necessary codeigniter things for login and signup
    private function forming(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');

    }
    public function view($page = 'home', $data = null)
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
    /*default, ehk selle meetodi avab esimesena*/
    public function index() {
        $this->view('home');

    }
    public function about() {
        $this->view('about');

    }
    public function login() {

        #Load data from codeigniter
        $this->forming();

        #set rules to check that both login fields have something written in them
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pswd', 'Password', 'required');

        #If both fields have something written
        if ($this->form_validation->run() === TRUE){

            $userName = $this->input->post('username');
            $password = $this->input->post('pswd');

            #Get the equivalent data from database
            $user = $this->user_model->get_user($userName);

            #Check if the password is correct
            $pswd_valid = password_verify ($password, $user['password_hash']);
            if ($pswd_valid) {
                return $pswd_valid;
            }
        }

        #If the validation is not met, go back to login page
        $this->view('login');


    }
    public function signup() {
        $this->forming();
        $this->view('signup');
    }
}
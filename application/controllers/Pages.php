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
        $data['pealkiri'] = "home";
        $this->view('home', $data);

    }
    public function about() {
        $this->view('about');

    }
    public function login() {
        $data['pealkiri'] = "login";
        $this->view('login', $data);
    }

}
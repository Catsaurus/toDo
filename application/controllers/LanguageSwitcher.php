<?php
class LanguageSwitcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function switchLang($language = "") {

        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);

        $this->load->library('user_agent');
        //redirect($this->agent->referrer());

        //redirect(base_url().trim($_GET['uri'], "/"));
        //redirect(($_SERVER['HTTP_REFERER']));
        if ($this->input->server('HTTP_REFERER') && strpos($this->input->server('HTTP_REFERER'), base_url()) === 0) {
            $this->session->set_userdata('prev_url', $this->input->server('HTTP_REFERER'));
        }
        else {
            $this->session->set_userdata('prev_url', base_url());
        }

        // when Continue button clicked or whatever.
        redirect($this->session->userdata('prev_url'), 'location');
    }
}
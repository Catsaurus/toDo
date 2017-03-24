<?php
class LanguageLoader
{
    function initialize() {
        session_start();
        $ci =& get_instance();
        $ci->load->helper('language');
        if (!empty($_SESSION['site_lang'])) {
            $ci->lang->load('general',$_SESSION['site_lang']);
        } else {
            $ci->lang->load('general','english');
        }
    }
}
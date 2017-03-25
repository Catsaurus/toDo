<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('view_loader'))
{
    function view_loader($view, $data=array())
    {
        $CI = &get_instance();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $CI->load->view('../views/templates/headerInside', $data, false);
        }
        else{
            $CI->load->view('../views/templates/header', $data, false);
        }
        $CI->load->view('../views/pages/'.$view, $data, false);
        $CI->load->view('../views/templates/footer', $data, false);
    }
}
?>

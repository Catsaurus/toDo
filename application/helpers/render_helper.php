<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Riana
 * Date: 09.03.17
 * Time: 15:18
 */
if (!function_exists('view_loader'))
{
    function view_loader($view, $data = array())
    {
        $CI = &get_instance();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $CI->load->view('../views/templates/headerInside', array(), false);
        }
        else{
            $CI->load->view('../views/templates/header', array(), false);
        }
        $CI->load->view('../views/pages/'.$view, $data, false);
        $CI->load->view('../views/templates/footer', array(), false);
    }
}
?>

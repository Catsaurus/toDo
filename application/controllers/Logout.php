<?php
/**
 * Created by PhpStorm.
 * User: Riana
 * Date: 09.03.17
 * Time: 18:27
 */
class Logout extends CI_Controller {

    public function index()
    {
        session_start();
        unset($_SESSION);
        session_destroy();
        view_loader('home');
    }
}
?>
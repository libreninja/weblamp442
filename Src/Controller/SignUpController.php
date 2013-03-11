<?php namespace Controller;
/**
 * sign up controller for word counter app
 *
 * @author Josh Benner
 **/

class LoginController
{
    private $_load;

    function __construct()
    {
        $this->_load = new \Controller\Load();

        $this->ShowLoginForm();
    }

    private function ShowLoginForm()
    {
        $this->_load->view('loginview.php');
    }
}
?>

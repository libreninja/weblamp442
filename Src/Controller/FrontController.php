<?php namespace Controller;
/**
 * front controller for word counter app
 *
 * @author Josh Benner
 **/
if(session_id() == '') {
    session_start();
}

if(!isset($_SESSION['user'])) 
{
    new \Controller\LoginController();
}
else
{
    new \Controller\UserController($_SESSION['user']);
}

?>

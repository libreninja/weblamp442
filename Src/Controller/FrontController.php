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
    $controller = new \Controller\UserController();
    $controller->ShowUser($_SESSION['user']);
}

?>

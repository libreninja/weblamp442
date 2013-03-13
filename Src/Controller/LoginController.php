<?php namespace Controller;
/**
 * login controller for word counter app
 *
 * @author Josh Benner
 **/

if(isset($_SESSION['user'])) 
{ 
    // Identifying the user 
    $user = $_SESSION['user']; 
    new \Controller\UserController($user);

} 
else // not logged in
{ 
    new \Controller\SignUpController();
} 
?>

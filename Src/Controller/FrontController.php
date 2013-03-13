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
    if(isset($_POST['userpost']))
    {
        $controller = new \Controller\PostController();
        if($_POST['userpost'] === "New Post")
        {
            $controller->ShowNewPost();
        }
        else
        {
            $controller->ShowPost($_POST['userpost']);
        }
    }
    else if(isset($_POST['newpost']))
    {
        $controller = new \Controller\PostController();
        $controller->NewPost( $_SESSION['user'],
            $_POST['newPostTitle'],
            $_POST['newPostText']
        );

        $controller = new \Controller\UserController();
        $controller->ShowUser($_SESSION['user']);

    }
    else
    {
        $controller = new \Controller\UserController();
        $controller->ShowUser($_SESSION['user']);
    }
}

?>

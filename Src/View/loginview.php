<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="Src/View/css/login.css" type="text/css" />
        <title>Sign in/up</title>

    </head>
    <body>
    <?php
    if( isset($_POST['submit']))
    {
        if( $_POST['submit'] === 'signup' )
        {
            include 'signup.php';
        }
    }
    else if( $_POST['signup'] === 'submit' )
    {
        $user = new \Model\User(
            $_POST['fname'],
            $_POST['lname'],
            $_POST['email'],
            $_POST['password']
        );



    }
    else
    {
        include 'login.php';
    }
    ?>
    </body>

</html>

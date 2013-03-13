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
        else if( $_POST['submit'] === 'login' )
        {
            $db = new \Utilities\Connection(
                Array(
                    'host' => 'localhost',
                    'username' => 'user',
                    'password' => 'password',
                    'dbname' => 'weblamp442'
                )
            );

            $user = $db->select('User', 'email=:email',
                                Array(':email' => $_POST['userid']));

            $password = hash("sha256",$user[0]['salt']. $_POST['password']);

            if(count($user) === 1 && $password === $user[0]['password'])
            {
                $_SESSION['user'] = $user[0]['id'];
            }
        }
    }
    else if(isset($_POST['signup']))
    {
        if( $_POST['signup'] === 'submit' )
        {
            $user = new \Model\User(
                $_POST['fname'],
                $_POST['lname'],
                $_POST['email'],
                $_POST['password'],
                true
            );

        }
    }
    else
    {
        include 'login.php';
    }
    ?>
    </body>

</html>

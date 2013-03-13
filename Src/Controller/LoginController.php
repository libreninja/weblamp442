<?php namespace Controller;
/**
 * login controller for word counter app
 *
 * @author Josh Benner
 **/

class LoginController
{
    private $_load;

    function __construct()
    {
        $this->_load = new \Controller\Load();

        if( isset($_POST['submit']))
        {
            if( $_POST['submit'] === 'signup' )
            {
                $this->ShowForm('signupview.php');
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

                $rows = $db->select('User', 'email=:email',
                    Array(':email' => $_POST['userid']));


                if(count($rows) === 1)
                {
                    $user = $rows[0];
                    $password = hash("sha256",$user['salt']. $_POST['password']);
                    if( $password === $user['password'] )
                    {
                        $_SESSION['user'] = $user['id'];
                        header("Location: ". $_SERVER['PHP_SELF']);
                        exit();
                    }
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
            $this->ShowForm('loginview.php');
        }
    }

    private function ShowForm($form)
    {
        $this->_load->view($form);
    }
}
?>

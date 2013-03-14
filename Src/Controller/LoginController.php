<?php namespace Controller;
/**
 * login controller for word counter app
 *
 * @author Josh Benner
 **/

class LoginController
{
    private $_load;
    private $_db;

    function __construct()
    {
        $this->_load = new \Controller\Load();

        $this->_db = new \Utilities\Connection(
            Array(
                'host' => 'localhost',
                'username' => 'user',
                'password' => 'password',
                'dbname' => 'weblamp442'
            )
        );

        if( isset($_POST['submit']))
        {
            if( $_POST['submit'] === 'signup' )
            {
                $this->ShowForm('signupview.php');
            }
            else if( $_POST['submit'] === 'login' )
            {
                
                $user = $this->LookupUser($_POST['userid']);
                $this->ValidateLogin($user);

            }
        }
        else if(isset($_POST['signup']))
        {
            echo "signing up..." . PHP_EOL;

            if( $_POST['signup'] === 'submit' )
            {
                $controller = new \Controller\UserController();
                $controller->CreateNewUser(
                    $_POST['fname'],
                    $_POST['lname'],
                    $_POST['email'],
                    $_POST['password']
                );
                $user = $this->LookupUser($_POST['email']);
                $this->ValidateLogin($user);
            }
        }
        else
        {
            $this->ShowForm('loginview.php');
        }
    }

    private function ValidateLogin($user)
    {
        $password = hash("sha256",$user['salt']. $_POST['password']);
        var_dump($user);
        var_dump($password);
        if( $password === $user['password'] )
        {
            $_SESSION['user'] = $user['id'];
            header("Location: ". $_SERVER['PHP_SELF']);
            exit();
        }
        $_SESSION['last error'] = "validation did not succeed.";
        header("Location: ". $_SERVER['PHP_SELF']);
    }

    private function LookupUser($email)
    {
        $rows = $this->_db->select('User', 'email=:email',
            Array(':email' => $email));


        if(count($rows) === 1)
        {
            return $rows[0];
        }
        $_SESSION['last error'] = "Error looking up user.";
        header("Location: ". $_SERVER['PHP_SELF']);
    }

    private function ShowForm($form)
    {
        $this->_load->view($form);
    }
}
?>

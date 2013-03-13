<?php
/**
 * Class representing a user
 **/

namespace Model;

class User
{
    private $_id;

    /**
     * constructor 
     * @param  string $fname user's first name
     * @param  string $lname user's last name
     **/
    public function __construct($fname, $lname, $email, $password, $create=false)
    {
        $this->_db = new \Utilities\Connection(
            Array(
                'host' => 'localhost',
                'username' => 'user',
                'password' => 'password',
                'dbname' => 'weblamp442'
            )
        );

        if(isset($_SESSION['user']))
        {
            $this->_id = $_SESSION['user'];
        }
        else if(!$create)
        {
            $user = $this->_db->select('User', 'email=:email',
                                        Array(':email' => $email));
            if(count($user) === 1)
            {
                $this->_id = $user[0]['id'];
            }
        }
        else
        {
            // only create a new user if the email isn't in the db
            if( count( $this->_db->select('User', 'email=:email',
                Array(':email' => $email))) === 0)
            {
                try {
                    // generate a salt for password storage
                    $salt = uniqid(mt_rand(), true);
                    $this->_db->insert('User', Array(
                        'fname' => $fname,
                        'lname' => $lname,
                        'email' => $email,
                        'salt' => $salt,
                        'password' => hash("sha256", $salt . $password)
                        )
                    );
                }
                catch( \Exception $e )
                {
                    echo 'Error creating new user: '. $e->getMessage(). PHP_EOL;
                }
            }
            else
            {
                echo 'User already exists.'. PHP_EOL;
            }
        }
    }

    public function getUserInfo()
    {
        return Array(
            "first" => $this->_fname,
            "last" => $this->_lname,
            "posts" => Array( new \Model\Post($this->_id, "foo bar bla", "revisiting foo"),
            new \Model\Post($this->_id, "foo bar bla", "a bar too far"), 
            new \Model\Post($this->_id, "foo bar bla", "the trouble with bla"),
            new \Model\Post($this->_id, "foo bar bla", "never foo again")
        ));
    }

}
?>

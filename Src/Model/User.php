<?php
/**
 * Class representing a user
 **/

namespace Model;

class User
{
    private $_db;
    private $_entity;

    /**
     * constructor 
     * @param  string $fname user's first name
     * @param  string $lname user's last name
     **/
    public function __construct($fname, $lname, $email, $password, $create=false)
    {
        $this->_db = new \Utilities\Db\Connection(
            Array(
                'host' => 'localhost',
                'username' => 'user',
                'password' => 'password',
                'dbname' => 'weblamp442'
            )
        );

        if(isset($_SESSION['user']))
        {
            $this->_entity = $_SESSION['user'];
        }
        else if($create)
        {
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

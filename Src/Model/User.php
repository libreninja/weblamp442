<?php namespace Model;

/**
 * Class representing a user
 **/
class User Extends \Model\ModelBase
{
    private $_id;
    public $fname;
    public $lname;
    public $email;
    public $password;

    public function LoadById($userid)
    {
        $rows = $this->_db->select('User', 'id=:userid',
            Array(':userid' => $userid));
        if(count($rows) === 1)
        {
            $user = $rows[0];
            $this->_id = $user['id'];
            $this->fname = $user['fname'];
            $this->lname = $user['lname'];
            $this->email = $user['email'];
            $this->password = $user['password'];
        }
    }

    public function Persist()
    {
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

    public function getUserInfo()
    {
        return Array(
            "first" => $this->fname,
            "last" => $this->lname,
            "email" => $this->email 
        );
    }

}
?>

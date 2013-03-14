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

    /**
     * LoadById - find db record and set member vars accordingly
     *
     * @return void
     **/
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

    /**
     * Persist - Save user to db
     **/
    public function Persist()
    {
        if( count( $this->_db->select('User', 'email=:email',
            Array(':email' => $this->email))) === 0)
        {
            try {
                // generate a salt for password storage
                $salt = substr(uniqid(mt_rand(), true),0,5);
                $pwd = hash("sha256", $salt . $this->password);
                echo "salt: $salt";
                $this->_db->insert('User', Array(
                    'fname' => $this->fname,
                    'lname' => $this->lname,
                    'email' => $this->email,
                    'salt' => $salt,
                    'password' => hash("sha256", $salt . $this->password)
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

    /**
     * getUserInfo - return user info
     * @return Array
     **/
    public function getUserInfo()
    {
        // load user post ids
        $rows = $this->_db->select('Post', 'author_id=:userid',
                                    Array(':userid' => $this->_id), 'id');

        $posts = Array();

        // load post model and add to array
        foreach($rows as $id)
        {
            $post = new \Model\Post();
            $post->LoadByPostId($id[0]);
            $posts[] = $post;
        }

        return Array(
            "first" => $this->fname,
            "last" => $this->lname,
            "email" => $this->email,
            "posts" => $posts
        );
    }

}
?>

<?php
/**
 * Class representing a user
 **/

namespace Model;

class User
{
    private $_id;
    private $_fname;
    private $_lname;
    private $_email;

    /**
     * constructor 
     * @param  string $fname user's first name
     * @param  string $lname user's last name
     **/
    public function __construct($fname, $lname, $email)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
    }

    public function getUserInfo()
    {
        return Array(
            "first" => $this->_fname,
            "last" => $this->_lname,
            "posts" => Array( new \Model\Post($this->_id, "foo bar bla"),
            new \Model\Post($this->_id, "foo bar bla"), 
            new \Model\Post($this->_id, "foo bar bla"),
            new \Model\Post($this->_id, "foo bar bla")
        ));
    }

}
?>

<?php namespace Controller;
/**
 * user controller for word counter app
 *
 * @author Josh Benner
 **/
class UserController Extends \Controller\ControllerBase
{

    public function CreateNewUser($fname, $lname, $email, $password)
    {
        $this->_model = new \Model\User();
        $this->_model->fname = $fname;
        $this->_model->lname = $lname;
        $this->_model->email = $email;
        $this->_model->password = $password;

        $this->_model->Persist();
    }

    public function ShowUser($userid)
    {
        $this->_model = new \Model\User();
        $this->_model->LoadById($userid);

        
        $data = $this->_model->getUserInfo();
        $this->_load->view( 'userview.php', $data );
    }
}
?>

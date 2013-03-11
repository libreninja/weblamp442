<?php namespace Controller;
/**
 * user controller for word counter app
 *
 * @author Josh Benner
 **/

/**
 * main controller for app
 **/
class UserController
{
    public $_load;
    public $_model;
    
    function __construct()
    {
        $this->_load = new Load();
        $this->_model = new \Model\User("Kevin", "Bacon", "kevin@sixdegrees.com");

        $this->home();
    }

    public function home()
    {
        $data = $this->_model->getUserInfo();
        $this->_load->view( 'userview.php', $data );
    }
}
?>

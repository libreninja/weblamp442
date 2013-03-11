<?php namespace Controller;
/**
 * user controller for word counter app
 *
 * @author Josh Benner
 **/

/**
 * user controller
 **/
class UserController
{
    public $_load;
    public $_model;
    
    function __construct()
    {
        $this->_load = new Load();
        $this->_model = new \Model\User();

        $this->home();
    }

    public function home()
    {
        $data = $this->_model->getUserInfo();
        $this->_load->view( 'userview.php', $data );
    }
}
?>

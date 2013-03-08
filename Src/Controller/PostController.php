<?php namespace Controller;
/**
 * user controller for word counter app
 *
 * @author Josh Benner
 **/

/**
 * post controller
 **/
class PostController
{
    public $_load;
    public $_model;
    
    function __construct()
    {
        $this->_load = new \Controller\Load();
        $this->_model = new \Model\Post("Josh Benner", "The rain in Spain.");

        $this->ShowPost();
    }

    public function ShowPost()
    {
        $data = $this->_model->GetPostInfo();
        $this->_load->view( 'postview.php', $data );
    }
}
?>

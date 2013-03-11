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
    private $_load;
    private $_model;
    
    function __construct()
    {
        $this->_load = new \Controller\Load();
        $this->_model = new \Model\Post("Josh Benner", "The rain in Spain.");

        $this->ShowPost();
    }

    private function ShowPost()
    {
        $data = $this->_model->GetPostInfo();
        $this->_load->view( 'postview.php', $data );
    }
}
?>

<?php namespace Controller;
/**
 * user controller for word counter app
 *
 * @author Josh Benner
 **/

/**
 * post controller
 **/
class PostController Extends ModelBase
{
    private $_load;
    private $_model;
    private $_db;
    
    function __construct()
    {
        $this->_load = new \Controller\Load();
    }

    private function ShowPost($postid)
    {
        $data = $this->_model->GetPostInfo();
        $this->_load->view( 'postview.php', $data );
    }
}
?>

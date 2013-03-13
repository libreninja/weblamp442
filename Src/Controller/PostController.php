<?php namespace Controller;
/**
 * post controller for word counter app
 **/
class PostController Extends \Controller\ControllerBase
{
    /**
     * ShowPost - loads a post and passes it to the view
     *
     * @return void
     **/
    public function ShowPost($postid)
    {
        $data = $this->_model->GetPostInfo();
        $this->_load->view( 'postview.php', $data );
    }
}
?>

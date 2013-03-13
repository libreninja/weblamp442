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
        $this->_model = new \Model\Post();
        $this->_model->LoadByPostId($postid);

        $data = $this->_model->GetPostInfo();
        $this->_load->view( 'postview.php', $data );
    }

    public function ShowNewPost()
    {
        $this->_model = new \Model\Post();

        $this->_load->view( 'newpost.php', $data );
    }

    public function NewPost($authorId, $title, $text)
    {
        $this->_model = new \Model\Post();
        $this->_model->_authorId = $authorId;
        $this->_model->_title = $title;
        $this->_model->_text = $text;

        $this->_model->Persist();
    }
}
?>

<?php
/**
 * Class representing a collection of written words authored by $author
 **/

namespace Model;

class Post Extends \Model\ModelBase implements \Utilities\ParseInterface
{
    private $_id;
    public $_authorId;
    public $_text;
    public $_title;

    public function getTitle()
    {
        return $this->_title;
    }

    public function getId()
    {
        return $this->_id;
    }

    /**
     * Implements the ParseInterface parse function
     *
     * @return array - frequency count of $word in $_text
     **/
    public function parse()
    {
        $wc = Array();
        foreach( str_word_count(strtolower($this->_text), 1) as $word )
        {
            if(array_key_exists($word, $wc))
            {
                $wc[$word] += 1;
            }
            else
            {
                $wc[$word] = 1;
            }
        }
        return $wc;
    }

    /**
     * dispatch post details
     * @return array
     **/
    public function GetPostInfo()
    {
        return Array(
            "_PostTitle" => $this->_title,
            "_PostAuthor" => $this->_authorId,
            "_PostText" => $this->_text,
            "_PostStats" => $this->parse()
        );
    }

    public function Persist()
    {
        try 
        {
            $this->_db->insert('Post', Array(
                'title' => $this->_title,
                'post' => $this->_text,
                'author_id' => $this->_authorId
            )
        );
        }
        catch( \Exception $e )
        {
            echo 'Error creating new post: '. $e->getMessage(). PHP_EOL;
        }
    }

    public function LoadByPostId($postid)
    {
        $rows = $this->_db->select('Post', 'id=:postid',
            Array(':postid' => $postid));
        if(count($rows) === 1)
        {
            $post = $rows[0];
            $this->_id = $post['id'];
            $this->_title = $post['title'];
            $this->_text = $post['post'];
            $this->_authorId = $post['author_id'];
        }
        
    }
}
?>

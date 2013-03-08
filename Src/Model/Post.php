<?php
/**
 * Class representing a collection of written words authored by $author
 **/

namespace Model;

class Post implements \Utilities\ParseInterface
{
    private $_authorId;
    private $_text;

    /**
     * constructor 
     * @param  string $author id for post
     * @param  string $text of the post
     **/
    public function __construct($author, $text)
    {
        $this->_authorId = $author;
        $this->_text = $text;
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
            "_PostAuthor" => $this->_authorId,
            "_PostText" => $this->_text,
            "_PostStats" => $this->parse()
        );
    }
}
?>

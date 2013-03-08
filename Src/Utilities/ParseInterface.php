<?php
/**
 * Parse interface for word count tracking web app
 *
 * @package Parser
**/

namespace Utilities;

interface ParseInterface
{
    /**
     * returns an array of words and the number of times used in the $text
     **/
    public function parse();
}
?>

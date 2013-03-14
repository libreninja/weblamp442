<?php 
/**
 * Word count webapp - uw-php-course group project
 *
 * @author Josh Benner
 * @copyright Josh Benner, 26 January, 2013
 **/
namespace Tests\Src;

/**
* Post class unit test code
*/
class PostTest extends \PHPUnit_Framework_TestCase
{
    public $_mock;

    /**
     * create/setup mock object for unit test
     **/
    public function setUp()
    {
        $str = "This may be one of the longest, if not *the* longest strings ever parsed by this source code";
        $this->_mock = new \Model\Post();
        $this->_mock->_text = $str;
    }

    /**
     * return test values for parse method
     * @return array
     **/
    public function getParseValues()
    {
        return array(
            array( Array(
                'this' => 2, 
                'may' => 1,
                'be' => 1,
                'one' => 1,
                'of' => 1, 
                'the' => 2,
                'longest' => 2,
                'if' => 1,
                'not' => 1,
                'strings' => 1, 
                'ever' => 1,
                'parsed' => 1,
                'by' => 1,
                'source' => 1,
                'code' => 1
                )
            )
        );
    }

    /**
     * @dataProvider getParseValues()
     */
    function testParse($wordCount)
    {
        $this->assertSame($wordCount, $this->_mock->parse());
    }
}
?>

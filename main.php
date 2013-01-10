<?php

/**
 * This Producer maintains a pipeline of things to produce
 */
class Producer
{
    /**
     * This contains our production source material 
     */
    private $_pipeline = Array(
                   1 => "One",
                   2 => "Two",
                   3 => "Three",
            );


    /**
     * @brief produce whatever is at $key in the pipeline.
     * @param $key    valid Array accessor value
     */
    public function produce($key)
    {
        if( isset($this->_pipeline[$key]) ) {
            print $this->_pipeline[$key];
        }
    }

    /**
     * @brief produce entire pipeline.
     * @param $key    valid Array accessor value
     */
    public function produceAll()
    {
        foreach( $this->_pipeline as $key => $value) {
            print $value . PHP_EOL;
        }
    }

    /**
     * @brief add content to pipeline
     */
    public function add2Pipeline($key, $value)
    {
        if( isset($this->_pipeline[$key]) ) {
            print "Key exists." . PHP_EOL;
            return;
        }
        $this->_pipeline[$key] = $value;
    }
}

/*
// construct pipeline manager object
$p = new Producer();

// go go go
$p->produceAll();

// produce specific pipeline item
$p->produce(2);

// add content to producer pipeline
$p->add2Pipeline("foo", "bar");

$p->produce("foo");
 */
?>

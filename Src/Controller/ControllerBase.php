<?php namespace Controller;
/**
 * MVC 'Controller' base class
 **/
abstract class ControllerBase
{
    /**
     * @var loader reference
     **/
    protected $_loader;

    /**
     * @var model reference
     **/
    protected $_model;

    /**
     * constructor
     **/
    public function __construct()
    {
        $this->_load = new \Controller\Load();
    }

}
?>

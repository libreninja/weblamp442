<?php namespace Model;
/**
 * MVC 'Model' base class
 **/
abstract class ModelBase
{
    /**
     * @var database connection object
     **/
    protected $_db;

    /**
     * constructor
     **/
    public function __construct()
    {
        $this->_db = new \Utilities\Connection(
            Array(
                'host' => 'localhost',
                'username' => 'user',
                'password' => 'password',
                'dbname' => 'weblamp442'
            )
        );
    }

}
?>

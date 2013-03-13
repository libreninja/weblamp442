<?php namespace \Utilities\Db;
/**
 * DB connection class
 **/
class Connection
{

    /**
     * database connection string
     * @var string
     **/
    private $_dsn;

    /**
     * database username
     * @var string
     **/
    private $_uname;

    /**
     * database password
     *
     * @var string
     **/
    private $_passwd;

    /**
     * database connection object
     * @var string
     **/
    private $_conn;

    /**
     * constructor
     * takes either an array of database parameters or a 
     * configuration object that represents database 
     * parameters.
     * @param   array       config options
     **/
    function __construct($cfg)
    {
        $this->_dsn = "mysql:host=". $cfg['host']. ";dbname=". $cfg['dbname'];
        $this->_uname = $cfg['username'];
        $this->_passwd = $cfg['password'];
    }

    /**
     * setup database connection
     **/
    public function connect()
    {
        $this->_conn = new \PDO( $this->_dsn, $this->_uname, $this->_passwd );

        // Set Errorhandling to Exception
        $this->_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * scrub/apply named parameters to sql statement, then execute
     * @param   string      the sql statement 
     * @param   array       named sql param key value pairs
     **/
    private function prepareSQL($sql, $params="")
    {
        if(!is_array($params))
        {
            $params = array();
        }
        $stmt = $this->_conn->prepare( $sql );
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * select function
     * return the result of a select query. This function may
     * return an array of rows, an array of models that repr-
     * esent the tables or rows.
     * @param   string      table name
     * @param   string      where clause
     * @param   array       named sql param key value pairs
     * @param   string      field names to select
     **/
    public function select($table, $where='', $params='', $fields='*')
    {
        if(!empty($where))
        {
            $sql .= " WHERE " . $where;
        }

        $sql = "SELECT ". $fields. " FROM ". $table;
        $sql .= ";";

        return $this->prepareSQL( $sql, $params )->fetchAll();
    }

    /**
     * insert function
     * execute insert sql statement. It should return last 
     * insert id if operation is successful, or throw an exc-
     * eption if the operation fails.
     * @param   string      table name
     * @param   array       named sql param key value pairs
     **/
    public function insert($table, $params)
    {
        $cols = array();
        $inserts = array();

        foreach($params as $key => $value)
        {
            $cols[] = $key;
            $inserts[":".$key] = $value;
        }

        $sql = "INSERT INTO ". $table. " (";
        $sql .= implode($cols, ','). ") VALUES(:". implode($cols, ',:'). ");";

        if( $this->prepareSQL( $sql, $inserts ) instanceof \PDOStatement )
        {
            return $this->_conn->lastinsertid();
        }

        throw new \Exception('Insert failed.');
    }

    /**
     * update function
     * execute the update sql statement. It should throw an
     * exception if the query fails to execute.
     * @param   string      table name
     * @param   array       named update clause key value pairs
     * @param   string      where clause
     * @param   array       named sql param key value pairs
     **/
    public function update($table, $changeset, $where, $params)
    {
        $updates = array();

        foreach($changeset as $key => $value)
        {
            $paramName = ":set_". $key; 
            $updates[] = $key. "=". $paramName;
            $params[$paramName] = $value;
        }

        $sql = "UPDATE ". $table. " SET ";
        $sql .= implode(',', $updates). " WHERE ". $where. ";";

        return $this->prepareSQL( $sql, $params )->rowCount();
    }

    /**
     * delete function
     * execute the update sql statement. It should throw an
     * exception if the query fails to execute.
     * @param   string      table name
     * @param   string      where clause
     * @param   array       named sql param key value pairs
     **/
    public function delete($table, $where, $params)
    {
        $sql = "DELETE FROM ". $table. " WHERE ". $where. ";";
        return $this->prepareSQL($sql, $params);
    }
}

$configArray = array(
    'host' => 'localhost',
    'username' => 'user',
    'password' => 'password',
    'dbname' => 'weblamp442'
);

try {
    $cn = new Connection( $configArray );
    $cn->connect();
    //$v = $cn->insert('User', array('firstname'=>'Ray', 'lastname'=>'Davies'));
    //$cn->update('User', array('lastname' => 'Benner'), "lastname = :lastname", array(':lastname'=>'B-)'));
    //$cn->delete('User', "lastname=:lastname", array(':lastname'=>'Bueller'));
    $data = $cn->select('User'); //, 'lastname=:lastname', array(':lastname' => 'Auerbach'));
    foreach($data as $row) {
        print_r($row);
    }
} catch(\PDOException $ex) {
    printf( $ex->getMessage() . PHP_EOL );
}
?>

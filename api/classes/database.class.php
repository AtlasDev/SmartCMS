<?php

/**

  This is the core where the database connection is managed and query's are executed

  Response codes:

  1001 = mysql error while connecting
  1002 = mysql error while executing query
  1003 = No drivers found!

**/

class DB extends FlatFile {
    private $_system;
    private $_connection;
    private $_DBusername;
    private $_DBpassword;
    private $_DBdatabase;
    private $_DBprefix;
    private $_DBhost;
    private $_DBport;

    public function __construct() {
        global $system;
        $this->_system = $system;
        if(PDO::getAvailableDrivers() == 0){
            $this->_system->response(1003, "There were no drivers found!");
            return false;
        }
        $config = new FlatFile("db");
        $this->_DBusername = $config->getContent("username");
        $this->_DBpassword = $config->getContent("password");
        $this->_DBdatabase = $config->getContent("database");
        $this->_DBprefix = $config->getContent("prefix");
        $this->_DBhost = $config->getContent("host");
        $this->_DBport = $config->getContent("port");
        $config = "";
        try {
            $dsn = 'mysql:host='.$this->_DBhost.';port='.$this->_DBport.';dbname='.$this->_DBdatabase;
            $this->_connection = new PDO($dsn, $this->_DBusername, $this->_DBpassword);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            $code = $e->getCode();
            $this->_system->response(1001, "MySQL returned an error on connecting! Error code: ".$code, true);
            return false;
        } 
    }
    
    public function select($query, $prep = "") {
        try {
            $query = str_replace("{prefix}", $this->_DBprefix, $query);
            $stmt = $this->_connection->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute($prep);
            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } catch (PDOException $e) {
            $code = $e->getCode();
            $this->_system->response(1002, "MySQL returned an error while executing a query! Error code: ".$code, true);
            return false;
        }
    }

    public function query($query, $prep = "") {
        try {
            $query = str_replace("{prefix}", $this->_DBprefix, $query);
            $stmt = $this->_connection->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            return $stmt->execute($prep);
        } catch (PDOException $e) {
            $code = $e->getCode();
            $this->_system->response(1002, "MySQL returned an error while executing a query! Error code: ".$code, true);
            return false;
        }
    }
    
}
?>

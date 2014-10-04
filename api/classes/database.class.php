<?php

/**

  This is the core where the database connection is managed and query's are executed

  Response codes:

  1001 = mysql error while connecting
  1002 = mysql error while executing query
  1003 = No drivers found!

**/

class DB extends FlatFile {
    private $_connection;
    private $_DBusername;
    private $_DBpassword;
    private $_DBdatabase;
    private $_DBprefix;
    private $_DBhost;
    private $_DBport;

    public function __construct() {
        $response = array("code" => "", "content" => "");
        if(PDO::getAvailableDrivers() == 0){
            $response["code"] = 1003;
            $response["content"] = "[SmartCMS] There were no drivers found!";
            echo json_encode($response);
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
            $response["code"] = 1001;
            $response["content"] = "[SmartCMS] MySQL returned an error on connecting! Error code: ".$code;
            echo json_encode($response);
            log_error("MySQL returned an error: ".$code);
            return false;
        } 
    }

    public function query($query) {
        try {
            $stmt = $this->_connection->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            $result = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } catch (PDOException $e) {
            $code = $e->getCode();
            $response["code"] = 1002;
            $response["content"] = "[SmartCMS] MySQL returned an error while executing a query! Error code: ".$code;
            echo json_encode($response);
            log_error("MySQL returned an error: ".$code);
            return false;
        }
    }
    
}
?>
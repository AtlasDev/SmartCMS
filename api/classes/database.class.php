<?php

/**
* This is the core where the database connection is managed and query's are executed
*
* Response codes:
*
* 1001 = Connecting to the database failed
* 1002 = No drivers found!
*
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
            $response["code"] = 1002;
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
            $this->_connection->exec("QUERY WITH SYNTAX ERROR");
        } catch (PDOException $e) {
            $response["code"] = 1001;
            $response["content"] = "[SmartCMS] There was no connection to the database possible!";
            echo json_encode($response);
            $code = $e->getCode();
            $file = "config/error.log";
            $current = file_get_contents($file);
            $current .= "[Error] ".date("Y-m-d H:i:s")." Mysql returned an error: ".$code."\n";
            file_put_contents($file, $current);
            return false;
        } 
    }

    public function runQuery($query, $returnRaw=false) {
        
    }

    public function getConfig($key) {
        
    }

}
?>
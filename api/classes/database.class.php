<?php
include_once("flatfile.class.php");

class DB extends FlatFile {
    private $_connection;
    private $_DBusername;
    private $_DBpassword;
    private $_DBdatabase;
    private $_DBprefix;
    private $_DBhost;
    private $_DBport;

    public function __construct() {
        $config = new FlatFile("db");
        $this->_DBusername = $config->getContent("username");
        $this->_DBpassword = $config->getContent("password");
        $this->_DBdatabase = $config->getContent("database");
        $this->_DBprefix = $config->getContent("prefix");
        $this->_DBhost = $config->getContent("host");
        $this->_DBport = $config->getContent("port");
        $this->_connection = mysqli_connect($this->_DBhost.$this->_port, $_this->DBusername, $this->_DBpassword, $this->_DBdatabase);
        if (mysqli_connect_errno($this->_connection)) {
            return false;
        } else {
            return true;
        }
    }

    public function runQuery($query, $returnRaw=false) {
        $result = $this->_connection->query($query);
        if($returnRaw == true) {
            $return = $query;
        } else {
            $return = $result->fetch_assoc();
        }
        return $return;
    }

    public function getConfig($key) {
        $result = $this->runQuery("SELECT * FROM {table_prefix} where key = " . $key);
    }

}
?>
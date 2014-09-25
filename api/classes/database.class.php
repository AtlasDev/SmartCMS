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
        if(PDO::getAvailableDrivers()=<0){
            return false;
        }
        $this->_connection = new PDO('mysql:host='.$this->_DBhost.':'.$this->_DBport.';dbname='.$this->_DBdatabase, $this->_DBusername, $this->_DBpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $pdo->exec ("QUERY WITH SYNTAX ERROR");
        } catch (PDOException $e) {
            $code = $e->getCode();
            $file = "../config/error.log";
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
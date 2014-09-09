<?php
include_once("flatfile.class.php");

class DB extends FlatFile {
    private $_DBusername;
    private $_DBpassword;
    private $_DBprefix;
    private $_DBhost;
    private $_DBport

    public function __construct() {
        $config = new FlatFile("db");
        $_DBusername = $config->getContent("username");
        $_DBpassword = $config->getContent("password");
        $_DBprefix = $config->getContent("prefix");
        $_DBhost = $config->getContent("host");
        $_DBport = $config->getContent("port");
    }
}
?>
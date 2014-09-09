<?php
include_once("classes/flatfile.class.php");

$json = new FlatFile("db");

print($json->getContent("port"));
?>
<?php

$_POST['type'] = "d";

/**
* This is the hub of the api, the routing and response are defined here.
*
* Response codes:
*
* 0 = success
* 1 = No request type defined
* 2 = CMS not installed
* 3 = database connection failed
*
* 1*** = see database.class.php
*
**/

include("classes/functions.php");
include("classes/classCombiner.php");
$response = array("code" => "", "content" => "");
//header('Content-type: application/json');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

if(empty($_POST['type'])) {
    $response["code"] = 1;
    $response["content"] = "[SmartCMS] No request type defined!";
    echo json_encode($response);
} else {
    if(file_exists("config/installed")) {
        $conn = new DB();
        //$result = $conn->query("SELECT * FROM smartcms_config");
        if($conn == true) {
            
        } else {
            die();
        }
    } else {
        $response["code"] = 2;
        $response["content"] = "[SmartCMS] This version of SmartCMS is not yet installed, please try again later!";
        echo json_encode($response);
    }
}

?>
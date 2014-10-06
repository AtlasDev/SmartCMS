<?php

ini_set('display_errors', 1);
$_POST['type'] = "theme";

/**

  This is the hub of the api, the routing and response are defined here.

  Response codes:

  0 = success
  1 = No request type defined
  2 = CMS not installed
  3 = Database connection failed
  4 = Request type not vailid

  1*** = see database.class.php
  2*** = see theme.class.php

**/

include("classes/functions.php");
include("classes/classCombiner.php");
$response = array("code" => "", "content" => "");
header('Content-type: application/json');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$types = array("theme", "page");

if(empty($_POST['type'])) {
    $response["code"] = 1;
    $response["content"] = "[SmartCMS] No request type defined!";
    echo json_encode($response);
} else {
    if(in_array($_POST['type'], $types)) {
        if(file_exists("config/installed")) {
            $conn = new DB();
            //$result = $conn->query("SELECT * FROM smartcms_config");
            if($conn == true) {
                if($_POST['type'] == "theme") {
                    $theme = new theme();
                    echo json_encode($theme->getMenu());
                }
            } else {
                die();
            }
        } else {
            $response["code"] = 2;
            $response["content"] = "[SmartCMS] This version of SmartCMS is not yet installed, please try again later!";
            echo json_encode($response);
        }
    } else {
        $response["code"] = 4;
        $response["content"] = "[SmartCMS] Request type not vailid!";
        echo json_encode($response);
    }
}

?>

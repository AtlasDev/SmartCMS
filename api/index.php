<?php

$_POST['type'] = "menu";

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
  3*** = see user.class.php

**/

include("classes/functions.php");
include("classes/classCombiner.php");
$response = array("code" => "", "content" => "");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$types = array("menu", "page", "login");

if(empty($_POST['type'])) {
    $response["code"] = 1;
    $response["content"] = "[SmartCMS] No request type defined!";
    echo json_encode($response);
} else {
    if(in_array($_POST['type'], $types)) {
        if(file_exists("config/installed")) {
            $conn = new DB();
            if($conn == true) {
                if($_POST['type'] == "menu") {
                    $theme = new Theme();
                    echo json_encode($theme->getMenu());
                } else if ($_POST['type'] == login) {
                    $user = new User();
                    $login = $user->login($_POST["username"], $_POST["password"]);
                    if($login == false) {
                        die();
                    }
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

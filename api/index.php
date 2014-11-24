<?php

$_POST['type'] = "menu";
$_POST['session'] = "D4nwbCRukvjZaYyZhJXWN1lQgw39OuXP1CnlZ8aFiLEh3JH8RI";

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

require_once("classes/classCombiner.php");

$conn = new DB();
$system = new System();
$user = new User();
$perms = new Perms();
$theme = new Theme();

header('Content-type: application/json');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

if(!empty($_POST['session'])) {
    if(!$user->resume($_POST['session'])) {
        die();
    }
}

if(empty($_POST['type'])) {
    $system->response(1, "No request type defined!");
} else {
    if(file_exists("config/installed")) {
        if($conn == true) {
            if($_POST["type"] == "login") {
                $login = $user->login($_POST["username"], $_POST["password"]);
            } else if($_POST['type'] == "menu") {
                echo json_encode($theme->getMenu());
            } else {
                $system->response(4, "Request type not vailid!");
            }
        } else {
            die();
        }
    } else {
        $system->response(2, "This version of SmartCMS is yet not installed, please try again later!");
    }
}

?>

<?php

/**

  This is where the theme, menu and sidebar is handled (Not the content!)

  Response codes:

  3001 = Invalid session key
  3002 = Invalid login credentials
  3003 = Username and/or password empty
  3004 = Session timed out

**/

class User {
    private $_conn;
    private $_session;
    public $username;
    public $fullname;
    public $email;
    public $permLevel;
    public $registerDate;
    public $registerIP;
    public $lastLogin;
    public $lastIP;
    public $loggedIn;

    public function __construct($session = "") {
        if($session == "" || strlen($session) == 50) {
            global $conn;
            $this->_conn = $conn;
            $result = $this->_conn->select("SELECT * FROM {prefix}users WHERE sessionID = :sessionID", array(":sessionID" => $session));
            if(isset($result[0]) || $session == "") {
                $user = $result[0];
                $this->_session = $session;
                $this->username = $user["username"];
                $this->fullname = $user["fullname"];
                $this->email = $user["email"];
                $this->permLevel = $user["perm_level"];
                $this->registerIP = $user["registerIP"];
                $this->registerDate = $user["registerDate"];
                $time = time();
                if($user["lastLogin"] >= $time - 3600) {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $this->lastLogin = $time;
                    $this->lastIP = $ip;
                    $prep = array(':sessionID' => $this->_session, ':lastLogin' => $time, 'lastIP' => $ip);
                    $this->_conn->query("UPDATE {prefix}users SET lastLogin = :lastLogin, lastIP = :lastIP WHERE sessionID = :sessionID", $prep);
                    $this->loggedIn = true;
                    var_dump($user);
                } else {
                    $this->loggedIn = false;
                    $response["code"] = 3004;
                    $response["content"] = "[SmartCMS] The session timed out!";
                    echo json_encode($response);
                    return false;
                }
            } else {
                $this->loggedIn = false;
                $response["code"] = 3001;
                $response["content"] = "[SmartCMS] The session key is invalid!";
                echo json_encode($response);
                return false;
            }
            $this->_session = $session;
            return true;
        } else {
            $response["code"] = 3001;
            $response["content"] = "[SmartCMS] The session key is invalid!";
            echo json_encode($response);
            return false;
        }
    }

    public function login($username = "", $password = "") {
        if($username == "" || $password == "") {
            $response["code"] = 3003;
            $response["content"] = "[SmartCMS] Username and/or password empty!";
            echo json_encode($response);
            return false;
        } else {
            $result = $this->_conn->select("SELECT * FROM {prefix}users WHERE username = :username", array(":username" => $username));
            if(!isset($result[0])) {
                $response["code"] = 3002;
                $response["content"] = "[SmartCMS] Login credentials invalid!";
                echo json_encode($response);
                return false;
            }
            $user = $result[0];
            if($this->_encryptPassword($password, $user["salt"]) == $user["password"]) {
                $this->_session = $this->_generateKey();
                $this->username = $user["username"];
                $this->fullname = $user["fullname"];
                $this->email = $user["email"];
                $this->permLevel = $user["perm_level"];
                $this->registerIP = $user["registerIP"];
                $this->registerDate = $user["registerDate"];
                $time = time();
                $ip = $_SERVER["REMOTE_ADDR"];
                $this->lastLogin = $time;
                $this->lastIP = $ip;
                $prep = array(':sessionID' => $this->_session, ':lastLogin' => $time, 'lastIP' => $ip , ':id' => $user["id"]);
                $this->_conn->query("UPDATE {prefix}users SET sessionID = :sessionID, lastLogin = :lastLogin, lastIP = :lastIP WHERE id = :id", $prep);
                $this->loggedIn = true;
                return $this->_session;
            } else {
                $response["code"] = 3002;
                $response["content"] = "[SmartCMS] Login credentials invalid!";
                echo json_encode($response);
                return false;
            }
        }
    }

    private function _encryptPassword($password, $salt) {
        return hash("sha256", hash("sha256", $salt) . hash("sha256", $password));
    }

    private function _generateKey() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 50; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

}

?>
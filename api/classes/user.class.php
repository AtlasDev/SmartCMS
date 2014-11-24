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
    private $_system;
    private $_conn;
    private $_session;
    public $username;
    public $fullname;
    public $email;
    public $group;
    public $registerDate;
    public $registerIP;
    public $lastLogin;
    public $lastIP;
    public $loggedIn;

    public function __construct() {
        global $conn;
        global $system;
        $this->_conn = $conn;
        $this->_system = $system;
        $this->loggedIn = false;
        $this->group = 0;
    }

    public function resume($session) {
        if(strlen($session) == 50) {
            $result = $this->_conn->select("SELECT * FROM {prefix}users WHERE sessionID = :sessionID", array(":sessionID" => $session));
            if(isset($result[0])) {
                $user = $result[0];
                $this->_session = $session;
                $this->username = $user["username"];
                $this->fullname = $user["fullname"];
                $this->email = $user["email"];
                $this->group = $user["group"];
                $this->registerIP = $user["registerIP"];
                $this->registerDate = $user["registerDate"];
                $time = time();
                if($user["lastLogin"] >= $time - 1800) {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $this->lastLogin = $time;
                    $this->lastIP = $ip;
                    $prep = array(':sessionID' => $this->_session, ':lastLogin' => $time, 'lastIP' => $ip);
                    $this->_conn->query("UPDATE {prefix}users SET lastLogin = :lastLogin, lastIP = :lastIP WHERE sessionID = :sessionID", $prep);
                    $this->loggedIn = true;
                    return true;
                } else {
                    $this->loggedIn = false;
                    $this->_system->response(3004, "The session timed out!");
                    return false;
                }
            } else {
                $this->loggedIn = false;
                $this->_system->response(3001, "The session key is invalid!");
                return false;
            }
        } else {
            $this->loggedIn = false;
            $this->_system->response(3001, "The session key is invalid!");
            return false;
        }
    }

    public function login($username = "", $password = "") {
        if($username == "" || $password == "") {
            $this->_system->response(3003, "Username and/or password empty!");
            return false;
        } else {
            $result = $this->_conn->select("SELECT * FROM {prefix}users WHERE username = :username", array(":username" => $username));
            if(!isset($result[0])) {
                $this->_system->response(3002, "Login credentials are invalid!");
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
                $this->_system->response(0, $this->_session);
            } else {
                $this->_system->response(3002, "Login credentials are invalid!");
                return false;
            }
        }
    }

    public function register() {

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
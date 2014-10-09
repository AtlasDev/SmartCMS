<?php

/**

  This is where the theme, menu and sidebar is handled (Not the content!)

  Response codes:

  3001 = Invailid session key
  3002 = Invailid login creditals

**/

class User {
    private $_conn
    private $_session;
    public $username;
    public $fullname;
    public $email;
    public $permLevel;

    public function __construct($session = "") {
        if($session == "" || strlen($session) == 50) {
            global $conn;
            $this->_conn = $conn;
            $this->_session = $session;
            return true;
        } else {
            $response["code"] = 3001;
            $response["content"] = "[SmartCMS] The session key is invailid!";
            echo json_encode($response);
            return false;
        }
    }

    public function login($username, $password) {
        $result = $this->_conn->query("SELECT * FROM {prefix}users WHERE username='".$username."'");
        $user = $result[0];
    }

    public function generateKey() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&+=';
        $randomString = '';
        for ($i = 0; $i < 50; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

}

?>
<?php

/**

  from here are the main functions line response 

  Response codes:

  --  NONE --

**/

class System {

    private $_conn;

    public function __construct() {
        global $conn;
        $this->_conn = $conn;
    }
    
    public function response($code, $content, $log = false) {
        $response = array("code" => $code, "content" => "[SmartCMS] ".$content);
        echo json_encode($response);
        if($log) {
            $file = "config/error.log";
            $current = file_get_contents($file);
            $current .= date("Y-m-d H:i:s")." ".$code.": ".$content."\n";
            file_put_contents($file, $current);
        }
        return true;
    }
    
}
?>

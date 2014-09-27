<?php
class Lang extends DB {
    private $_lang;

    public function __construct($lang) {
        $url = "config/" . $lang . ".json";
        $headers = get_headers($url);
        $response = substr($headers[0], 9, 3);
        if ($response != "404") {
            $this->_lang = json_decode(file_get_contents($url), true);
        } else {
            return false;
        }
    }

    public function get($key) {
        return $this->_json[$key];
    }
}
?>
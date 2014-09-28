<?php
class Lang extends DB {
    private $_lang;

    public function __construct($lang) {
        $this->_lang = json_decode(file_get_contents("config/" . $lang . ".json"), true);
    }

    public function get($key) {
        if (array_key_exists($key, $this->_lang)) {
            return $this->_lang[$key];
        } else {
            return false;
        }
    }
}
?>
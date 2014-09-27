<?php
class Lang extends DB {
    private $_lang;

    public function __construct($lang) {
        $this->_json = json_decode(file_get_contents("config/lang/" . $lang . ".json"), true);
    }

    public function getRawContent() {
        return $this->_json;
    }

    public function getContent($key) {
        return $this->_json[$key];
    }
}
?>
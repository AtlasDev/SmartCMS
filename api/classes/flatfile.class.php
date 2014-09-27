<?php
class FlatFile {
    private $_json;

    public function __construct($file) {
        $this->_json = json_decode(file_get_contents("config/" . $file . ".json"), true);
    }

    public function getRawContent() {
        return $this->_json;
    }

    public function getContent($key) {
        return $this->_json[$key];
    }
}
?>
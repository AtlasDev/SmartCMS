<?php
class FlatFile {
    private $_json;

    public function __construct($file) {
        $url = "config/" . $file . ".json";
        $headers = get_headers($url);
        $response = substr($headers[0], 9, 3);
        if ($response != "404") {
            $this->_json = json_decode(file_get_contents($url), true);
        } else {
            return false;
        }
    }

    public function getRawContent() {
        return $this->_json;
    }

    public function getContent($key) {
        return $this->_json[$key];
    }
}
?>
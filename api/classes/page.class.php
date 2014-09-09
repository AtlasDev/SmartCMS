<?php
include_once("DB.class.php");

class Page {
    private $_title;
    private $_content;
    
    public function __construct($title, $content) {
        $this->_content = $content;
        $this->_title = $title;
    }
    
    public function getContent() {
        return $this->_content;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function setContent($content) {
        $this->_content = $content;
        return true;
    }

    public function setTitle($title) {
        $this->_title = $title;
    }
}
?>
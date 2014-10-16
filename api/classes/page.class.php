<?php

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

    public function getTheme() {
        $this->_title = $title;
    }

}
?>
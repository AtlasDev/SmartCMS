<?php

class Template {

    private $_theme;
    
    public function __construct($theme == "default") {
        $this->_theme = $theme;
    }

    public function getThemeName() {
        return $this->_theme;
    }
    
    public function render() {
    
    }

}
?>
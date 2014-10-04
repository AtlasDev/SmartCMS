<?php

/**

  This is where the theme, menu and sidebar is handled (Not the content!)

  Response codes:

  2001 = Unknown theme

**/

class Template {

    private $_theme;
    
    public function __construct($theme = "") {
        global $conn;
        $this->_theme = $theme;
        print_r($conn->query("SELECT * FROM {prefix}config"));
    }

    public function getThemeName() {
        return $this->_theme;
    }
    
    public function getThemeInfo() {
        
    }
    
    public function getMenu() {
        
    }
    
    public function getSideBar() {
        
    }
    
    public function render() {
        
    }

}
?>
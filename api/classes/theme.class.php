<?php

/**

  This is where the theme, menu and sidebar is handled (Not the content!)

  Response codes:

  2001 = Unknown theme

**/

class Theme {

    private $_theme;
    private $_conn;
    
    public function __construct($theme = "") {
        global $conn;
        $this->_conn = $conn;
        $this->_theme = $theme;
    }

    public function getThemeName() {
        return $this->_theme;
    }
    
    public function getThemeInfo() {
        
    }
    
    public function getMenu() {
        return $this->_conn->query("SELECT * FROM {prefix}menu", array());
    }
    
    public function getSideBar() {
        
    }
    
    public function render() {
        
    }

}
?>
<?php

/**

  This is where the theme, menu and sidebar is handled (Not the content!)

  Response codes:

  2001 = Unknown theme

**/

class Theme {
    private $_theme;
    private $_conn;
    private $_system;
    
    public function __construct($theme = "") {
        global $conn;
        global $system;
        $this->_conn = $conn;
        $this->_system = $system;
        $this->_theme = $theme;
    }

    public function getThemeName() {
        return $this->_theme;
    }
    
    public function getThemeInfo() {
        
    }
    
    public function getMenu() {
        return $this->_conn->select("SELECT * FROM {prefix}menu", array());
    }
    
    public function getSideBar() {
        
    }
    
    public function render() {
        
    }

}
?>
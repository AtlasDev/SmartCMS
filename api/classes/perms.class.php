<?php

/**

  This is where the permissions and groups are being handled.

  Response codes:

  -- none --

**/

class Perms extends User {
    private $_conn;
    private $_system;

    public function __construct() {
        global $conn;
        global $system;
        $this->_conn = $conn;
        $this->_system = $system;
    }

    public function hasPerm($group, $node) {
        
    }

    public function getGroups() {
        
    }

    public function getPerms($group) {
        
    }

    public function getInheritance($group) {
        $allInheritances = $this->_conn->select("SELECT * FROM {prefix}group_inheritance", array());
        $done = array();
        $done[] = $group;
        $inheritances = $this->_getInheritanceHelper($group, $allInheritances);
        foreach($inheritances as $inher) {
            $done[] = $inher;
            $inheritances = $this->_getInheritanceHelper($inher, $allInheritances);
        }
        return $inheritances;
    }
    
    private function _getInheritanceHelper($inheritance, $allInheritances) {
        $inheritances = array();
        foreach($allInheritances as $inher => $key) {
            if($key["group_id"] == $inheritance) {
                $inheritances[] = $key["inheritance"];
            }
        }
        return $inheritances;
    }
    
    public function raw() {
        $raw;
        foreach($this->getGroups() as $group) {
            $raw = getPerms($group);
        }
        return $raw;
    }
    
}

?>
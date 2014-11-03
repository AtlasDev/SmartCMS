<?php

/**

  This is where the groups and permissions are handled

  Response codes:

  ---
  No response codes
  ---

**/

class Group {

    public function getGroups() {

    }

    public function getPerms($group) {

    }

    public function raw() {
        $raw;
        foreach($this->getGroups() as $group) {
            $raw = getPerms($group);
        }
        return $raw;
    }

?>
<?php

class Chnews{

    // announcements

    private $announcements;

    public function __construct($announcements) {    
        $this->announcements = $announcements;
    }

    public function getannouncements() {
        return $this->announcements;
    }

}

?>
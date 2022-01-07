<?php

class Emaildomain{

    private $domain_name;

    public function __construct($domain_name) {    
        $this->domain_name = $domain_name;
    }

    public function getdomainname() {
        return $this->domain_name;
    }

}

?>
<?php

class Usermanagement{

    private $username;
    private $name_of_user;
    private $role2;
    private $enroll_date;
    private $last_access;

    public function __construct($username, $name_of_user, $role2, $enroll_date, $last_access) {    
        $this->username = $username;
        $this->name_of_user = $name_of_user;
        $this->role2 = $role2;
        $this->enroll_date = $enroll_date;
        $this->last_access = $last_access;
    }

    public function getusername() {
        return $this->username;
    }

    public function getname_of_user() {
        return $this->name_of_user;
    }

    public function getrole() {
        return $this->role2;
    }

    public function getenroll_date() {
        return $this->enroll_date;
    }

    public function getlast_access() {
        return $this->last_access;
    }
}

?>
<?php

class UserEntity
{
    public $username;
    public $password;
    public $naam;
    public $voornaam;
    public $authority;
    public $emailadres;


    function __construct($username, $password, $naam, $voornaam, $authority, $emailadres) {
        $this->username = $username;
        $this->password = $password;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->authority = $authority;
        $this->emailadres = $emailadres;
    }
}

?>
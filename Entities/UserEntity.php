<?php

class UserEntity
{
    public $username;
    public $password;
    public $naam;
    public $voornaam;
    public $authority;
    public $emailadres;
    public $img_path;
    public $ip;


    function __construct($username, $password, $naam, $voornaam, $authority, $emailadres, $img_path, $ip) {
        $this->username = $username;
        $this->password = $password;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->authority = $authority;
        $this->emailadres = $emailadres;
        $this->img_path = $img_path;
        $this->ip = $ip;
    }
}

?>
<?php

class ProductEntity
{
    public $id;
    public $username;
    public $password;
    public $naam;
    public $voornaam;
    public $authority;
    public $emailadres;


    function __construct( $id, $username, $password, $naam, $voornaam, $authority, $emailadres) {
        $this->id = $id;
        $this->$username = $username;
        $this->$password = $password;
        $this->$naam = $naam;
        $this->$voornaam = $voornaam;
        $this->$authority = $authority;
        $this->$emailadres = $emailadres;
    }
}

?>
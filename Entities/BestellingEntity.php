<?php
class BestellingEntity
{
public  $id;
public $username;
public $factuuradres;
public $leveradres;
public $levermethode;
public $betaalmethode;
public $datum;



 function __construct($id, $username, $factuuradres, $leveradres, $levermethode, $betaalmethode, $datum) {
        $this->id = $id;
        $this->username = $username;
        $this->factuuradres = $factuuradres;
        $this->leveradres = $leveradres;
        $this->levermethode = $levermethode;
        $this->betaalmethode = $betaalmethode;
        $this->datum = $datum;
    }
}

?>
<?php
class BestellingEntity
{
public  $id;
public $username;
public $factuuradres;
public $leveradres;
public $levermethode;
public $betaalmethode;



 function __construct($id, $username, $factuuradres, $leveradres, $levermethode, $betaalmethode) {
        $this->id = $id;
        $this->username = $username;
        $this->factuuradres = $factuuradres;
        $this->leveradres = $leveradres;
        $this->levermethode = $levermethode;
        $this->betaalmethode = $betaalmethode;
    }
}

?>
<?php
class bestellingEntity
{
public  $id;
public $factuuradres;
public $leveradres;
public $levermethode;
public $betaalmethode;
public $user_id;


 function __construct($id, $factuuradres, $leveradres, $levermethode, $betaalmethode, $user_id) {
        $this->id = $id;
        $this->factuuradres = $factuuradres;
        $this->leveradres = $leveradres;
        $this->levermethode = $levermethode;
        $this->betaalmethode = $betaalmethode;
        $this->user_id = $user_id;
    }
}

?>
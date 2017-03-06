<?php

class ProductEntity
{
    public $id;
    public $cat_naam;
    public $naam;
    public $prijs;
    public $beschrijving;
    public $datum_toegevoegd;
    public $img_path;
    
    function __construct($id, $cat_naam, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path) {
        $this->id = $id;
        $this->cat_naam = $cat_naam;
        $this->naam = $naam;
        $this->prijs = $prijs;
        $this->beschrijving = $beschrijving;
        $this->datum_toegevoegd = $datum_toegevoegd;
        $this->img_path = $img_path;
    }
}

?>
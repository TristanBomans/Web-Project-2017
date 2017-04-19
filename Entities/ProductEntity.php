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
    public $uitgelicht;
    public $avg_rating;
    public $numb_ratings;
    public $active;

    function __construct($id, $cat_naam, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path, $uitgelicht, $avg_rating, $numb_ratings, $active) {
        $this->id = $id;
        $this->cat_naam = $cat_naam;
        $this->naam = $naam;
        $this->prijs = $prijs;
        $this->beschrijving = $beschrijving;
        $this->datum_toegevoegd = $datum_toegevoegd;
        $this->img_path = $img_path;
        $this->uitgelicht = $uitgelicht;
        $this->avg_rating = $avg_rating;
        $this->numb_ratings = $numb_ratings;
        $this->active = $active;
    }
}

?>
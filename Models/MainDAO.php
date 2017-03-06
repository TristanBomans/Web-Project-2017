<?php

include_once "../Entities/ProductEntity.php";


class MainDAO {
    static function getProduct($id) {
    	require '../Credentials.php';
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM producten where id='$id'");
        $product = null;

        if ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $cat_id = $row[1];
            $naam = $row[2];
            $prijs = $row[3];
            $beschrijving = $row[4];
            $datum_toegevoegd = $row[5];
            $img_path = $row[6];

            $product = new ProductEntity($id, $cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path);
        }

        mysqli_close($mysqli);
        return $product;
    }

    static function getAll() {
    	require '../Credentials.php';
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM producten");
        $product = null;
        $productenArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $cat_id = $row[1];
            $naam = $row[2];
            $prijs = $row[3];
            $beschrijving = $row[4];
            $datum_toegevoegd = $row[5];
            $img_path = $row[6];

            $product = new ProductEntity($id, $cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path);
            array_push($productenArray, $product);
        }

        mysqli_close($mysqli);
        return $productenArray;
    }
    static function getAllUitgelichte() {
    	require '../Credentials.php';
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM producten where uitgelicht = 1");
        $product = null;
        $productenArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $cat_id = $row[1];
            $naam = $row[2];
            $prijs = $row[3];
            $beschrijving = $row[4];
            $datum_toegevoegd = $row[5];
            $img_path = $row[6];

            $product = new ProductEntity($id, $cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path);
            array_push($productenArray, $product);
        }

        mysqli_close($mysqli);
        return $productenArray;
    }

    static function addProduct($cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path){
    	require '../Credentials.php';
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO producten (cat_id, naam, prijs, beschrijving, datum_toegevoegd, img_path) VALUES ('$cat_id', '$naam', '$prijs', '$beschrijving', '$datum_toegevoegd', '$img_path')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

}

?>
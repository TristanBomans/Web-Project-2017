<?php
require_once ("../Entities/ProductEntity.php");
require_once ("../Models/MainDAO.php");
if (isset($_POST['test']))
{
    // MainDAO::addProduct($_POST['cat_id'], $_POST['naam'], $_POST['beschrijving'], $_POST['datum_toegevoegd'], $_POST['img_path']);
    MainDAO::addProduct("Multi Media",'Samsung', 45, 'Heel nice', date("Y-m-d H:i:s"), 'img_path');
    // $var = MainDAO::getProduct(2);
    // var_dump($var);
}

if (isset($_POST['winkelmandje']))
{
    session_start();
    // $product = new ProductEntity($_POST['cat_id'], $_POST['naam'], $_POST['beschrijving'], $_POST['datum_toegevoegd'], $_POST['img_path']);   
    $product = new ProductEntity( 2,"Multi Media", "iPhone 7", 45,"beschrijving", date("Y-m-d H:i:s"), "C- Schijf xD");  
    if (isset($_SESSION['winkelmandje']) == false) {
       $_SESSION['winkelmandje']  = [];
    } 
    array_push($_SESSION['winkelmandje'],  $product);
    var_dump($_SESSION['winkelmandje']);
    //($id, $cat_naam, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path)
    header("location: http://localhost/Web-Project-2017/Views/");
}
if (isset($_GET['opgevraagdProduct'])){
    $url = "location: http://localhost/Web-Project-2017/Views/detail.php?opgevraagdProduct=".$_GET['opgevraagdProduct'];
    header($url);
}

if (isset($_POST['toAddProduct'])){

    $product = MainDAO::getProduct($_POST['toAddProduct']);

    session_start();
    if (isset($_SESSION['winkelmandje']) == false) {
    $_SESSION['winkelmandje']  = [];
    } 
    array_push($_SESSION['winkelmandje'],  $product);


    $url = "location: http://localhost/Web-Project-2017/Views/index.php";
    header($url);
}
?>
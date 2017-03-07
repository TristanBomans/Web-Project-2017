<?php
require_once ("../Entities/ProductEntity.php");
require_once ("../Models/MainDAO.php");

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

if (isset($_POST['typeRequest'])){
    if($_POST['typeRequest'] == "registeruser"){
        MainDAO::addUser($_POST['username'], $_POST['password'], $_POST['naam'], $_POST['voornaam'], 0,$_POST['email']);
        $url = "location: http://localhost/Web-Project-2017/Views/index.php";
        header($url);
    }
    if($_POST['typeRequest'] == "loginuser"){

        $url = "location: http://localhost/Web-Project-2017/Views/index.php";
        header($url);
    }
}


?>
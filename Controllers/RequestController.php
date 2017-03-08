<?php
require_once ("../Entities/ProductEntity.php");
require_once ("../Models/MainDAO.php");

define('URL',"location: http://localhost/Web-Project-2017/Views/" );

if (isset($_GET['opgevraagdProduct'])){
    $url = URL."detail.php?opgevraagdProduct=".$_GET['opgevraagdProduct'];
    header($url);
}

if (isset($_POST['toAddProduct'])){
    $product = MainDAO::getProduct($_POST['toAddProduct']);
    session_start();
    if (isset($_SESSION['winkelmandje']) == false) {
    $_SESSION['winkelmandje']  = [];
    } 
    array_push($_SESSION['winkelmandje'],  $product);
    $url = URL."index.php";
    header($url);
}

if (isset($_POST['typeRequest'])){
    if($_POST['typeRequest'] == "registeruser"){
        MainDAO::addUser($_POST['username'], $_POST['password'], $_POST['naam'], $_POST['voornaam'], 0, $_POST['email']);
        $url = URL."index.php";
        header($url);
    }
    if($_POST['typeRequest'] == "loginuser")
    {
        echo "true";
        $gebruiker = MainDAO::getUser($_POST['username']);
        if ($gebruiker != null)
        {
            echo "true";
            if ($gebruiker->password == $_POST['password']) 
            {
                echo "password correct";
                session_start();
                $_SESSION['user'] = $gebruiker;
                 $url = URL."index.php";
                header($url);
            }
            else
            {
                 echo "password false";
                 $url = URL."login.php";
                 header($url);
            }
        } 
        else
        {
            echo "user not found";
            $url = URL."login.php";
            header($url);
        }
    }
}
if (isset($_GET['action'])){
    session_start();
    if ($_GET['action'] == "logout") {
        unset($_SESSION['user']);
        
        $url = URL."index.php";
        header($url);
    }
}
if (isset($_POST['sortMethode'])){
    $methode = $_POST['sortMethode'];
    $teSorteren = explode("-", $methode)[0];
    $directie =  explode("-",$methode)[1];
    $alleProducten = MainDAO::getAll();
    
    Util::compareByDatum($alleProducten,"desc");
    return $alleProducten;
}
?>
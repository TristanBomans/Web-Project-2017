<?php
require_once ("../Entities/ProductEntity.php");
require_once ("../Models/MainDAO.php");
require_once ("../Controllers/Util.php");

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

if (isset($_POST['sortMethode']))
{
    $methode = $_POST['sortMethode'];
    $teSorteren = explode("-", $methode)[0];
    $directie =  explode("-",$methode)[1];
    $alleProducten = MainDAO::getAll();
   
    if($teSorteren == "naam")
    {
        Util::compareByName($alleProducten,$directie);

    }
    elseif($teSorteren == "datum")
    {
        Util::compareByDatum($alleProducten,$directie);
    }

    $array = [];

   for ($i=0; $i < sizeof($alleProducten) ; $i++) 
   { 
        $array[$i] = [];
        $array[$i]['id'] = $alleProducten[$i]->id;
        $array[$i]['cat_naam'] = $alleProducten[$i]->cat_naam;
        $array[$i]['naam'] = $alleProducten[$i]->naam;
        $array[$i]['prijs'] = $alleProducten[$i]->prijs;
        $array[$i]['beschrijving'] = $alleProducten[$i]->beschrijving;
        $array[$i]['datum_toegevoegd'] = $alleProducten[$i]->datum_toegevoegd;
        $array[$i]['img_path'] = $alleProducten[$i]->img_path;
   }

    echo json_encode(utf8ize($array));
}

// functie gebruikt van: http://stackoverflow.com/a/19366999

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
?>
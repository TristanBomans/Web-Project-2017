<?php
// GLOBAL REQUIREMENTS
require_once ("../Entities/ProductEntity.php");
require_once ("../Entities/UserEntity.php");
require_once ("../Models/MainDAO.php");
require_once ("../Controllers/Util.php");
define('URL',"location: http://localhost/Web-Project-2017/Views/" );
define('prevURL', "location: ".$_SERVER['HTTP_REFERER']);
session_start();

// REQUEST HANDLING
if (isset($_GET['opgevraagdProduct']))
{
    $url = URL."detail.php?opgevraagdProduct=".$_GET['opgevraagdProduct'];
    header($url);
}

if (isset($_POST['toAddProduct']))
{
    $product = MainDAO::getProduct($_POST['toAddProduct']);
    if (isset($_SESSION['winkelmandje']) == false) {
    $_SESSION['winkelmandje']  = [];
    } 
    array_push($_SESSION['winkelmandje'],  $product);
    header(prevURL);
}

if (isset($_POST['typeRequest'])){
    if($_POST['typeRequest'] == "registeruser")
    {
        $toAddUser = new UserEntity($_POST['username'], $_POST['password'], $_POST['naam'], $_POST['voornaam'], 0, $_POST['email']);
        MainDAO::addUser($toAddUser);
        $_SESSION['user'] = $toAddUser;
        $url = URL."index.php";
        header($url);
    }

    if($_POST['typeRequest'] == "loginuser")
    {
        echo "true";
        $gebruiker = MainDAO::getUser($_POST['username']);
        if ($gebruiker != null)
        {
            if ($gebruiker->password == $_POST['password']) 
            {
                echo "password correct";
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
    if ($_GET['action'] == "logout") {
        unset($_SESSION['user']);
        header(prevURL);
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
     elseif($teSorteren == "categorie")
    {
        Util::compareByCat($alleProducten,$directie);
    }
     elseif($teSorteren == "prijs")
    {
        Util::compareByPrijs($alleProducten,$directie);
    }

    $array = Util::productObjectToArray($alleProducten);
    $array = Util::productArrayDateConversion($array);

    echo json_encode(Util::utf8ize($array));
}
?>
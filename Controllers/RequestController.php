<?php

// GLOBAL REQUIREMENTS      
 require_once ("../Entities/ProductEntity.php");       
 require_once ("../Entities/ReviewEntity.php");        
 require_once ("../Entities/UserEntity.php");      
 require_once ("../Models/MainDAO.php");       
 require_once ("../Controllers/Util.php");
 require_once ("../Controllers/LogicController.php");


session_start();

// REQUEST HANDLING
if (isset($_GET['opgevraagdProduct']))
{
    LogicController::getDetailPage();
}

if (isset($_POST['toAddProduct']))
{
    LogicController::addNewProduct();
}

if (isset($_POST['typeRequest']))
{
    if($_POST['typeRequest'] == "registeruser")
    {
        LogicController::registeruser();
    }

    if($_POST['typeRequest'] == "loginuser")
    {
        LogicController::userLogIn();
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
    $objectArray = LogicController::sortAllProducts();

    $array = Util::productObjectToArray($objectArray);
    $array = Util::productArrayDateConversion($array);

    echo json_encode(Util::utf8ize($array));
}

if (isset($_POST['toAddReview']))
{
    LogicController::addReview();
}

if (isset($_POST['Filteren'])) 
{
   
    $selectedCats = LogicController::getSelectedCats();
    $filteredData = LogicController::makeFilteredArray($selectedCats);
    
    $_SESSION['filterData'] = $filteredData;
    header(prevURL);
}

?>
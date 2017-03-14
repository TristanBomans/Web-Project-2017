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

if (isset($_POST['editProduct'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie'];
    $beschrijving = $_POST['beschrijving'];

    $productt = LogicController::getProduct($_POST['id']);
    
    $productt->id = $id;
    $productt->naam = $naam;
    $productt->prijs = $prijs;
    $productt->categorie = $categorie;
    $productt->beschrijving = $beschrijving;

    MainDAO::updateProduct($productt);
    header("location: ".$_SERVER['HTTP_REFERER']);

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
        if(prevURL == "location: http://localhost/Web-Project-2017/Views/admin.php"){
            var_dump(prevURL);
            header(URL);
            die();
        }
        else{
            header(prevURL);
            die();
        }
    }
}

if (isset($_POST['sortMethode']))
{
    $objectArray = LogicController::sortAllProducts();

    $array = Util::productObjectToArray($objectArray);

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
    die();
}

?>
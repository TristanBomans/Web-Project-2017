<?php

// GLOBAL REQUIREMENTS      
 // require_once ("../Entities/ProductEntity.php");       
 // require_once ("../Entities/ReviewEntity.php");        
 // require_once ("../Entities/UserEntity.php");      
 // require_once ("../Models/MainDAO.php");       
 // require_once ("../Controllers/Util.php");
 // require_once ("../Controllers/LogicController.php");
 include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php";
 
if(!(isset($_SESSION)) ){
    session_start();
}

if (isset($_POST['toAddProduct'])) //IS VOOR WINKELMANDJE
{
    LogicController::addNewProduct();
}

if (isset($_POST['newDBProd'])) {
    if(!empty($_FILES["file"]["name"])){
        $uploadedFile = "../Resources/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile);
    }
    
    if (isset($_FILES['file']['name'])){
        $img_path = "../Resources/".$_FILES["file"]["name"];
    }
    else{
        $img_path = "../Resources/dummypng.png";
    }



    $_POST['prijs'] = str_replace(",",".",$_POST['prijs']);
    $_POST['prijs'] = floatval($_POST['prijs']);



    $product = new ProductEntity(-1, $_POST['categorie'], $_POST['naam'],floatval($_POST['prijs']),$_POST['beschrijving'], date("Y-m-d H:i:s"),$img_path,0,0,0);

var_dump($product);
 
    
    LogicController::addDBNewProd($product);
    header("location: http://localhost/Web-Project-2017/Views/admin-product.php");
}


if (isset($_POST['editProduct'])) {

    $_POST['prijs'] = str_replace(",",".",$_POST['prijs']);
    $_POST['prijs'] = floatval($_POST['prijs']);

    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie'];
    $beschrijving = $_POST['beschrijving'];
    $img_path = "../Resources/".$_FILES["file"]["name"];
    $productt = LogicController::getProduct($_POST['id']);
    
    $productt->id = $id;
    $productt->naam = $naam;
    $productt->prijs = floatval($prijs);
    $productt->cat_naam = $categorie;
    $productt->beschrijving = $beschrijving;
       

    if(!empty($_FILES["file"]["name"])){
        $uploadedFile = "../Resources/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile);
        $productt->img_path = "../Resources/" . $_FILES["file"]["name"];
    }
    var_dump($productt);
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
            header("location: ".URL);
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

    for ($i=0; $i < sizeof($array); $i++) { 
        $array[$i]['datum_toegevoegd'] = date("d-m-Y",strtotime($array[$i]['datum_toegevoegd']));
    }

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

if (isset($_GET['xD'])) 
{
    $dataA = [];
    $alB = MainDAO::getAllBestellingen();
   

    foreach ($alB as $B) {
        $dataA[$B->id] = MainDAO::getBestellingInhoudBestelling($B->id);
    }
    var_dump($dataA);

}

if (isset($_POST['deleteProdWinkelMandje']))
{
    $product = LogicController::getProduct($_POST['productID']);
    $_SESSION['winkelmandje'] = array_udiff($_SESSION['winkelmandje'],[$product], 'Util::compare_objects');
    header(prevURL);
}

?>
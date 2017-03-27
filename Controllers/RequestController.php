<?php

// GLOBAL REQUIREMENTS      

 include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";
 
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

    $dt = new DateTime("now", new DateTimeZone("Europe/berlin"));

    $product = new ProductEntity(-1, $_POST['categorie'], $_POST['naam'],floatval($_POST['prijs']),$_POST['beschrijving'], $dt->format("Y-m-d H:i:s"),$img_path,0,0,0);

var_dump($product);
 
    
    LogicController::addDBNewProd($product);
    header("location: /Views/admin-product");
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
        if(prevURL == "location: /Views/admin"){
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

    $_SESSION['selectedCats'] = $filteredData;
 

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

if (isset($_POST['contactSend'])) {
    $dt = new DateTime("now", new DateTimeZone("Europe/berlin"));
    $toAddContact = new ContactEntity(-1, $_SESSION['user']->username, $_POST['subject'], $_POST['message'],$dt->format("Y-m-d H:i:s"));
    MainDAO::addContactMessage($toAddContact);
    header("location: ".URL);
}

if (isset($_POST['editCat'])) {
    $newCategorie = new CategorieEntity($_POST['naam']);
    MainDAO::updateCategorie($newCategorie, $_POST['editCatName']);
    header("location: ".URL."Views/admin-category");
}

if (isset($_POST['newCat'])) {
    $toAddCat = new CategorieEntity($_POST['naam']);
    MainDAO::addCategory($toAddCat);
    header("location: ".URL."Views/admin-category");
}

if (isset($_GET['debugging'])) {
    // session_start();
    var_dump($_SESSION);
}
?>
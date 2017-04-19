<?php

// GLOBAL REQUIREMENTS      
#VERWIJST NAAR DE DOC DIE ALLE DOCS MET ELKAAR VERBINDT (NAMESPACES)

include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; 
 
 #ELKE KEER CHECKEN OF ER EEN SESSION IS GESTART, ZO NIET START HET
if(!(isset($_SESSION)) ){ 
    session_start();
}

#VOOR HET WINKELMANDJE, PRODUCTEN TOE TE VOEGEN, STEEKT PROD IN SESSION
if (isset($_POST['toAddProduct'])) 
{
    LogicController::addNewProduct();
}

#DIT IS CODE VOOR EEN NIEUW PRODUCT TOE TE VOEGEN MET FOTO ETC
if (isset($_POST['newDBProd'])) {

    if ($_POST['naam'] == null ||$_POST['prijs'] == null ||$_POST['uitgelicht'] == null ||$_POST['categorie'] == null || $_POST['beschrijving'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "NewProdEmpty";
        Util::redirect("/Views/admin-product");
    } 

    if(!(empty($_FILES["file"]["name"]))){
        $uploadedFile = "../Resources/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile);
    }
    
    if ($_FILES['file']['name'] != ""){
        $img_path = "../Resources/".$_FILES["file"]["name"];
    }
    else{
        $img_path = "../Resources/dummypng.png";
    }

    $_POST['prijs'] = str_replace( ",", ".", $_POST['prijs']);
    $_POST['prijs'] = floatval($_POST['prijs']);

    $dt = new DateTime("now", new DateTimeZone("Europe/berlin"));

    $product = new ProductEntity(-1, $_POST['categorie'], $_POST['naam'], floatval($_POST['prijs']), $_POST['beschrijving'], $dt->format("Y-m-d H:i:s"), $img_path, 0, 0, 0);

    var_dump($product);
  
    LogicController::addDBNewProd($product);
    header("location: /Views/admin-product");
}

#DIT IS CODE VOOR EEN PRODUCT TE BEWERKEN, WORDT OOK GECHECKED OP FLOAT VALUES ETC (MET KOMMA EN PUNT)
if (isset($_POST['editProduct'])) {
    if ($_POST['id'] == null || $_POST['naam'] == null ||$_POST['prijs'] == null ||$_POST['uitgelicht'] == null ||$_POST['categorie'] == null || $_POST['beschrijving'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "EditProdEmpty";
        Util::redirect("/Views/admin-product");
    } 
    else{
        $_POST['prijs'] = str_replace(",",".",$_POST['prijs']);
        $_POST['prijs'] = floatval($_POST['prijs']);

        $id = $_POST['id'];
        $naam = $_POST['naam'];
        $prijs = $_POST['prijs'];
        $uitgelicht = $_POST['uitgelicht'];
        $categorie = $_POST['categorie'];
        $beschrijving = $_POST['beschrijving'];
        $img_path = "../Resources/".$_FILES["file"]["name"];

        $productt = LogicController::getProduct($_POST['id']);

        $productt->id = $id;
        $productt->naam = $naam;
        $productt->prijs = floatval($prijs);
        $productt->cat_naam = $categorie;
        $productt->uitgelicht = $uitgelicht;
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
   
}

#VOOR DE REQUEST VAN GEBRUIKERS LOGINS EN REGISTREREN TE BEHANDELEN
if (isset($_POST['typeRequest']))
{
    if($_POST['typeRequest'] == "registeruser")
    {
        #VOOR EEN GEBRUIKER TE REGISTREREN, DUS TOE TE VOEGEN
        LogicController::registeruser();
    }

    if($_POST['typeRequest'] == "loginuser")
    {
        #VOOR EEN GEBRUIKER IN TE LOGGEN, IN EEN SESSION TE STEKEN
        LogicController::userLogIn();
    }
}

#VOOR EEN GEBRUIKER UIT TE LOGGEN, ZIJN SESSION TE UNSETTEN|OOK WORDT DE VORIGE URL 
#BEPAALD AAN DE HAND VAN DE URL OF HIJ TERUG MOET GEREDIRECT WORDEN NAAR HOME (met woordje 'admin')
if (isset($_GET['action'])){
    if ($_GET['action'] == "logout") {
        unset($_SESSION['user']);
        setcookie("WebShopCookie", null, 1, "/");
        if(strpos( prevURL, "admin" )) {
            header("location: ".URL);
            die();}
        else{
            header(prevURL);
            die();
        }
    }
}

#DIT IS VOOR TE SORTEREN EN VOOR TERUG TE STUREN, DEZE CALL ZAL MEESTAL VANUIT AJAX GEMAAKT WORDEN, VANDAAR json_encode
if (isset($_POST['sortMethode']))
{
    $objectArray = LogicController::sortAllProducts();

    $array = Util::productObjectToArray($objectArray);

    for ($i=0; $i < sizeof($array); $i++) { 
        $array[$i]['datum_toegevoegd'] = date("d-m-Y",strtotime($array[$i]['datum_toegevoegd']));
        $array[$i]['prijs'] = round($array[$i]['prijs'], 1);
        $array[$i]['avg_rating'] = round($array[$i]['avg_rating'], 1);
        
    }

    echo json_encode(Util::utf8ize($array));
}

#DIT IS BEDOELD VOOR REVIEWS OP EEN PRODUCT TOE TE VOEGEN
if (isset($_POST['toAddReview']))
{
    LogicController::addReview();
}

#DIT IS VOOR TE FILTEREN OP PRODUCTEN PUUR VIA PHP
if (isset($_POST['Filteren'])) 
{
    $selectedCats = LogicController::getSelectedCats();
    $filteredData = LogicController::makeFilteredArray($selectedCats);

    $_SESSION['selectedCats'] = $filteredData;
 
    header(prevURL);
    die();
}

#DIT IS VOOR TE FILTEREN OP PRODUCTEN PUUR VIA AJAX
if (isset($_POST['FilterenAJAX'])) 
{
    $selectedCats = $_POST['checkedcats'];
    
    foreach ($selectedCats as $cat) {
        $cat = new CategorieEntity($cat);
    }

    $filteredData = LogicController::makeFilteredArray($selectedCats);
    $_SESSION['selectedCats'] = $filteredData;

    $filteredData = util::productObjectToArray($filteredData);

    for ($i=0; $i < sizeof($filteredData); $i++) { 
        $filteredData[$i]['datum_toegevoegd'] = date("d-m-Y",strtotime($filteredData[$i]['datum_toegevoegd']));
        $filteredData[$i]['prijs'] = round($filteredData[$i]['prijs'], 1);
        $filteredData[$i]['avg_rating'] = round($filteredData[$i]['avg_rating'], 1);

    }
    echo json_encode(Util::utf8ize($filteredData));
}


#DIT IS VOOR EEN ITEM TE VERWIJDEREN UIT HET WINKELMANDJE VANUIT DE "FULL WINKELMANDJE" PAGE
if (isset($_POST['deleteProdWinkelMandje']))
{
    $product = LogicController::getProduct($_POST['productID']);
    $_SESSION['winkelmandje'] = array_udiff($_SESSION['winkelmandje'],[$product], 'Util::compare_objects');
    unset($_SESSION['aantallen'][$product->id]);

    // $_SESSION
    header(prevURL);
}

#DIT IS VOOR EEN BERICHT TE STUREN NAAR DE ADMINS, ELKE USER KAN DIT DOEN, BIJHORENDE MAIL WORDT OOK NAAR DE ADMIN GESTUURD
if (isset($_POST['contactSend'])) {
    
    if ($_POST['subject'] == null || $_POST['message'] == null ) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "contactEmpty";
        header(prevURL);
    }
    else{
        $dt = new DateTime("now", new DateTimeZone("Europe/berlin"));
        $toAddContact = new ContactEntity(-1, $_SESSION['user']->username, $_POST['subject'], $_POST['message'], $dt->format("Y-m-d H:i:s"));

        $toSendMessage = "<h3>Iemand stuurde u een nieuw bericht op Webshop Tristan!</h3>";
        $toSendMessage .= "<b>Username:</b> ".$_SESSION['user']->username."<br>";
        $toSendMessage .= "<b>Name:</b> ".$_SESSION['user']->voornaam."<br>";
        $toSendMessage .= "<b>Family name:</b> ".$_SESSION['user']->naam."<br>";
        $toSendMessage .= "<b>User's email:</b> ".$_SESSION['user']->emailadres."<br>";
        $toSendMessage .= "<b>Message:</b><br><br>";
        $toSendMessage .= "<div style='border: 1px solid black;'>".$_POST['message']."</div>";

        $AllUsers = LogicController::getAllUsers();

        foreach ($AllUsers as $user) {
            if ($user->authority == 1) {
                 Util::sendMail($_POST['subject'], $toSendMessage, $user->emailadres);
            }
        }
       
        MainDAO::addContactMessage($toAddContact);
        header("location: " . URL);
    }

}

#DIT IS VOOR EEN CATEGORIE TE EDITEN VANUIT HET ADMIN PANEEL
if (isset($_POST['editCat'])) {
   if ($_POST['naam'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "editCatEmpty";
        Util::redirect("/Views/admin-category");
    } 
    else{
        $newCategorie = new CategorieEntity($_POST['naam']);
        MainDAO::updateCategorie($newCategorie, $_POST['editCatName']);
        header("location: ".URL."Views/admin-category");
    }
}

#DIT IS OM EEN NIEUWE CATEGORIE TE VOEGEN
if (isset($_POST['newCat'])) {
   if ($_POST['naam'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "newCatEmpty";
        Util::redirect("/Views/admin-category");
    } 
    else{
        $toAddCat = new CategorieEntity($_POST['naam']);
        MainDAO::addCategory($toAddCat);
        header("location: ".URL."Views/admin-category");
    }
}



#DIT IS VOOR DE ADMIN DE USERS TE LATEN BEWERKEN
if (isset($_POST['editUser'])) {

    if ($_POST['naam'] == null ||$_POST['voornaam'] == null ||$_POST['authority'] == null ||$_POST['emailadres'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "editUserAdmEmpty";
        Util::redirect("/Views/admin-users");
    } 

    $userpw = MainDAO::getUser(($_POST['toEditUser']));
    $userpw = $userpw->password;
    $user = MainDAO::getUser($_POST['toEditUser']);
    $user->naam = $_POST['naam'];
    $user->voornaam = $_POST['voornaam'];
    $user->authority = $_POST['authority'];
    $user->emailadres = $_POST['emailadres'];
    

    var_dump($user);
    MainDAO::updateUser($user);
   
    if ($user->username == $_SESSION['user']->username) {
        unset($_SESSION['user']);
        $_SESSION['user'] = $user;
    }
  
    header(prevURL);
}

#DIT IS VOOR HET AANTAL IN HET VOLLEDIGE WINKELMANDJE AAN TE PASSEN
if (isset($_POST['aanpassen-fw-aantal'])) {
    if ($_POST['aantal'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "aanpassen-fw-aantal-empty";
        header(split("&",prevURL)[0]);
    }
    else{
        $prodID = intval($_POST['product-id']);
        $_SESSION['aantallen'][$prodID] = $_POST['aantal'];

        if ($_POST['aantal'] == 0) {
            unset($_SESSION['aantallen'][$prodID]);
            $_SESSION['winkelmandje'] = array_udiff($_SESSION['winkelmandje'],[MainDAO::getProduct($prodID)], 'Util::compare_objects');  
        }
        header(prevURL);
    }
}

#DIT IS VOOR HET VERWIJDEREN VAN EEN PRODUCT VANUIT HET ADMIN PANEEL
if (isset($_GET['deleteProd'])) {
    MainDAO::deleteProduct($_GET['deleteProd']);
    header(prevURL);
}

#DIT IS VOOR DE USER ZIJN EIGEN INFORMATIE TE LATEN AANPASSEN VANUIT DE "PROFIEL" NAV PAGE
if (isset($_GET['editUserdataPuser'])) {
    $user = $_SESSION['user'];
    if ($_GET['toEditUserdata'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "editUserAdmEmpty";
        header(split("&",prevURL)[0]);
    }
    else{
        switch ($_GET['editUserdataPuser']) {
            case 'naam':
                $user->naam = $_GET['toEditUserdata'];
                break;
           case 'voornaam':
                $user->voornaam = $_GET['toEditUserdata'];
                break;
            case 'emailadres':
                $user->emailadres = $_GET['toEditUserdata'];
                break;
            default:
                break;
        }
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "succesupdate";
        MainDAO::updateUser($user);
        header(split("&",prevURL)[0]);
    }
}

#VOOR HET AANPASSEN VAN DE TITEL VAN DE WEBSITE DIE VANBOVEN TE ZIEN VALT
if (isset($_POST['changewsconfig'])){
    $conf = MainDAO::getWSConfig();
    if ( $_POST['wsnaam'] == null ||  $_POST['wsup'] == null) {
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wsconfigempty";
        header(split("&",prevURL)[0]);
    }
    else{
        $conf->naam_ws = $_POST['wsnaam'];
        $conf->aantal_up = $_POST['wsup'];
        MainDAO::updateWSConfig($conf);

        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "succesupdate";
        header(prevURL);
    }
}

#OM EEN PAYMENT AF TE HANDELEN MET POPUP
if(isset($_POST['payementinfo'])){
    $dt = new DateTime("now", new DateTimeZone("Europe/berlin"));
   
   var_dump($_POST); 

   $betaalmethode = $_POST['betaalmethode'];
   $faland = $_POST['fa-land'];
   $fagemeente = $_POST['fa-gemeente'];
   $fastraat = $_POST['fa-straat'];
   $fanummer = $_POST['fa-nummer'];
   $fapostcode = $_POST['fa-postcode'];
   $laland = $_POST['la-land'];
   $lagemeente = $_POST['la-gemeente'];
   $lastraat = $_POST['la-straat'];
   $lanummer = $_POST['la-nummer'];
   $lapostcode = $_POST['la-postcode'];
   $levermethode = $_POST['levermethode'];
   
   if (isset($_POST['avw'])) {
        $avw = true;
   }
   else{
        $avw = null;
   }

   if ($betaalmethode == null){
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wpbm";
    }
    if ($faland == null){
        if (in_array( "wfgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wfgeg";
        }
    }
    if ($fagemeente == null){
        if (in_array( "wfgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wfgeg";
        }
    }
    if ($fastraat == null){
        if (in_array( "wfgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wfgeg";
        }
    }
    if ($fanummer == null){
        if (in_array( "wfgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wfgeg";
        }
    }
    if ($fapostcode == null){
        if (in_array( "wfgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wfgeg";
        }
    }
    if ($laland == null){
        if (in_array( "wlgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wlgeg";
        }
    }
    if ($lastraat == null){
        if (in_array( "wlgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wlgeg";
        }
    }
    if ($lanummer == null){
        if (in_array( "wlgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wlgeg";
        }
    }
    if ($lapostcode == null){
        if (in_array( "wlgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wlgeg";
        }
    }
    if ($levermethode == null){
        if (in_array( "wlgeg", $_SESSION['mess']) != true) {
            $_SESSION['mess'][sizeof($_SESSION['mess'])] = "wlgeg";
        }
    }
    if ($avw == null){
        $_SESSION['mess'][sizeof($_SESSION['mess'])] = "geenavw";
    }

    if ($_SESSION['mess'] != null){
        Util::redirect("/Views/payment");
    }

    $factuuradr = $faland . ", " . $fastraat . " " . $fanummer .", " . $fapostcode . " " . $fagemeente;
    $leveradr = $laland . ", " . $lastraat . " " . $lanummer .", " . $lapostcode . " " . $lagemeente;

    $bestelling = new BestellingEntity(-1, $_SESSION['user']->username, $factuuradr , $leveradr , $levermethode, $betaalmethode, $dt->format("Y-m-d H:i:s"));
    MainDAO::addBestelling($bestelling);

    $laatsteId = MainDAO::getAllBestellingen();
    $laatsteId= $laatsteId[sizeof($laatsteId)-1]->id;

    foreach($_SESSION['winkelmandje'] as $wm){
        $tempBI = new BestelinhoudEntity(-1 , $laatsteId, $wm->id, $_SESSION["aantallen"][$wm->id]);
        var_dump($_SESSION["aantallen"]);
        var_dump($tempBI);
        MainDAO::addBestellingInhoud($tempBI);
    }

    unset($_SESSION['winkelmandje']);
    $_SESSION['winkelmandje'] = [];
    unset($_SESSION['aantallen']);
    $_SESSION['aantallen'] = [];

    $_SESSION['mess'][sizeof($_SESSION['mess'])] = "bsuc";
    header("location: /Views/bestelling-overzicht?b=$laatsteId");
    
}

?>

<?php
/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 23/03/2017
 * Time: 0:20
 */
include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php";
if(!(isset($_SESSION)) ){
    session_start();
}

?>

<!doctype HTML>
<html lang="nl">
<head>
    <title>Payement</title>
    <?php include("partials/includes.php"); ?>
</head>
<body class="container-fluid">

<?php include("partials/navbar.php"); ?>

<form action="../Views/payement.php" method="post">
    <div>
        <p>Betaalmethode: </p>
        <div class="clearfix">
            <div class="clearfix">
                <input type="radio" name="betaalmethode" value="paypal" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="paypal-pay-img"></div>
            </div>
            <div class="clearfix">
                <input type="radio" name="betaalmethode" value="mastercard" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay"id="mastercard-pay-img"></div>
             </div>
            <div class="clearfix">
                <input type="radio" name="betaalmethode" value="americanexpress" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="americanexpress-pay-img"></div>
            </div>
        </div>

        <div>
            <div >Factuuradres: </div>
            <input type="text" name="factuuradres">

        </div>
        <div>
            <div >Leveradres: </div>
            <input type="text" name="leveradres">
        </div>

        <div>
            <div >Levermethode: </div>
            <select name="levermethode">
                <option value="vrachtwagen">Vrachtwagen</option>
                <option value="ophalen">Ophalen</option>
                <option value="webshopsnelservice">Webshop Snelservice</option>
            </select>
        </div>




    </div>
    <input type="submit" id="submit-btn-payement" />
    <input type="hidden" name="payementinfo" value="true">
</form>

<?php
if(isset($_POST['payementinfo'])){
    $bestelling = new BestellingEntity(-1, $_SESSION['user']->username, $_POST['factuuradres'],$_POST['leveradres'],$_POST['levermethode'],$_POST['betaalmethode'],date("Y-m-d H:i:s"));
    MainDAO::addBestelling($bestelling);

    $laatsteId = MainDAO::getAllBestellingen();
    $laatsteId= $laatsteId[sizeof($laatsteId)-1]->id;
    foreach($_SESSION['winkelmandje'] as $wm){
        $tempBI = new BestelinhoudEntity(-1 , $laatsteId, $wm->id);
        MainDAO::addBestellingInhoud($tempBI);
    }
    unset($_SESSION['winkelmandje']);




    echo "<div>U bestelling is geplaatst!</div> ";

    if($_POST['betaalmethode'] == "paypal")
    {
        echo"<a id='submit-btn-payement' href='https://www.paypal.com/us/home'>Betaling voltooien</a>";
    }

}?>

<?php include("partials/footer.php"); ?>

</body>
</html>
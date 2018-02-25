<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([0, 1]); ?>

<?php
    if ($_SESSION['winkelmandje'] == null) 
    {
        header("location: ". URL."/");
    }
?>

<!doctype HTML>
<html lang="nl">
<head>
    <title>Payment</title>
    <?php include("partials/includes.php"); ?>
</head>
<body class="container-fluid">

    <?php include("partials/navbar.php"); ?>

    <?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

    <div id='payment-all-wrap'>
        <div id="payment-titelbar">
            Betaling
        </div>
        <form action="/Controllers/RequestController.php" method="post" id='payment-cont'>
            <div>
                <p>Betaalmethode: </p>
                <div class="clearfix">
                    <div class="clearfix">
                        <input  type="radio" name="betaalmethode" value="paypal" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="paypal-pay-img"></div>
                    </div>
                    <div class="clearfix">
                        <input  type="radio" name="betaalmethode" value="mastercard" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="mastercard-pay-img"></div>
                     </div>
                    <div class="clearfix">
                        <input  type="radio" name="betaalmethode" value="americanexpress" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="americanexpress-pay-img"></div>
                    </div>
                </div>
                <div id='payment-factuuradres-wrapper'>
                    <div class='title-lafa'>Factuuradres: </div>
                     <div >Land: </div>
                    <input  type="text" name="fa-land">
                    <div >Gemeente: </div>
                    <input  type="text" name="fa-gemeente">
                    <div >Straat: </div>
                    <input  type="text" name="fa-straat">
                    <div >Nummer: </div>
                    <input  type="text" name="fa-nummer">
                    <div >Postcode: </div>
                    <input  type="text" name="fa-postcode">
                </div>
                <div id='payment-leveradres-wrapper'>
                    <div class='title-lafa'>Leveradres: </div>
                    <div >Land: </div>
                    <input  type="text" name="la-land">
                    <div >Gemeente: </div>
                    <input  type="text" name="la-gemeente">
                    <div >Straat: </div>
                    <input  type="text" name="la-straat">
                    <div >Nummer: </div>
                    <input  type="text" name="la-nummer">
                    <div >Postcode: </div>
                    <input  type="text" name="la-postcode">
                </div>
                <div id="wrapper-checkbox-fa-la-same">
                    <input id='checkbox-fa-la-same' type="checkbox" name="la-fa-zelfde">Ik wens mijn leveradres hetzelfde als mijn factuuratieadres
                </div>
                <br>
                <div>
                    <div >Levermethode: </div>
                    <select required name="levermethode">
                        <option value="vrachtwagen">Vrachtwagen</option>
                        <option value="ophalen">Ophalen</option>
                        <option value="webshopsnelservice">Webshop Snelservice</option>
                    </select>
                </div>
                <div class="payment-lineitem">
                    <input id='algemene-voorwaarden-inp' type="checkbox" name="avw">Ik accepteer de Algemene voorwaarden onvoorwaardelijk (<a id='algemene-voorwaarden-a' href='https://rule.alibaba.com/rule/detail/2041.htm?spm=2114.48010208.0.0.FNcplH'>lees de Algemene voorwaarden</a>)
                </div>
            </div>
            <input type="submit" class="submit-btn-payment" />
            <input type="hidden" name="payementinfo" value="true">
        </form>
    </div>
   <div id="margin-div"></div>

    <?php include("partials/footer.php"); ?>

</body>
</html>
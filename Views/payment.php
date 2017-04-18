<?php
    include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";
    if(!(isset($_SESSION)) ){
        session_start();
    }

    if ($_SESSION['winkelmandje'] == null) 
    {
        header("location: ". URL."/");
    }

    if (!(isset($_SESSION['user']))) 
    {
        Util::redirect("/?err=nli");
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
                        <input required type="radio" name="betaalmethode" value="paypal" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="paypal-pay-img"></div>
                    </div>
                    <div class="clearfix">
                        <input required type="radio" name="betaalmethode" value="mastercard" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="mastercard-pay-img"></div>
                     </div>
                    <div class="clearfix">
                        <input required type="radio" name="betaalmethode" value="americanexpress" class="betaalmethode-float"><div class="betaalmethode-icon-fuullpay" id="americanexpress-pay-img"></div>
                    </div>
                </div>
                <div>
                    <div >Factuuradres: </div>
                    <input required type="text" name="factuuradres">
                </div>
                <div>
                    <div >Leveradres: </div>
                    <input required type="text" name="leveradres">
                </div>
                <div>
                    <div >Levermethode: </div>
                    <select required name="levermethode">
                        <option value="vrachtwagen">Vrachtwagen</option>
                        <option value="ophalen">Ophalen</option>
                        <option value="webshopsnelservice">Webshop Snelservice</option>
                    </select>
                </div>
                <div class="payment-lineitem">
                    <input id='algemene-voorwaarden-inp' required type="checkbox" name="">Ik accepteer de Algemene voorwaarden onvoorwaardelijk (<a id='algemene-voorwaarden-a' href='https://rule.alibaba.com/rule/detail/2041.htm?spm=2114.48010208.0.0.FNcplH'>lees de Algemene voorwaarden</a>)
                </div>
            </div>
            <input type="submit" class="submit-btn-payment" />
            <input type="hidden" name="payementinfo" value="true">
        </form>

       
    </div>
    <?php include("partials/footer.php"); ?>

</body>
</html>
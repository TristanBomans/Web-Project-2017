<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([0, 1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Winkelmandje volledig</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 
 		
 		<div>
 		<?php
	 		if(isset($_SESSION['winkelmandje']))
		        {
		            echo "<div id='full-winkelmandje-content'>";
		            foreach ($_SESSION['winkelmandje'] as $product) 
		            {
		                echo "<form action='../Controllers/RequestController.php' method='POST'><input type='submit' class='exit-icon-fw' value=''/><input type='hidden' name='productID' value='".$product->id."'/><input name='deleteProdWinkelMandje' type='hidden' value='true'/></form><div class='full-winkelmandje-content-lineitem clearfix'><div class='full-winkelmandje-content-naam'>".$product->naam."</div><form action='../Controllers/RequestController.php' method='POST'><input type='hidden' name='aanpassen-fw-aantal' value='true'><input type='submit' value='Aanpassen'><div class='aantal-ehprijs-fw'><input class='aantal-fw' type='number' name='aantal' value='".$_SESSION["aantallen"][$product->id]."'><input type='hidden' name='product-id' value='".$product->id."'</input></form><div class='full-winkelmandje-content-prijs'> € ".$product->prijs. "</div></div><div class='full-winkelmandje-content-besch'>".$product->beschrijving."</div><div class='eenh-fullprijs-fw'>€ ".$product->prijs*$_SESSION["aantallen"][$product->id]."</div></div>";

		                echo "<hr class='hr-winkelmandje-full'>";


		              
		            }
		            echo "<div class='full-winkelmandje-content-lineitem clearfix'><div id='fw-total-lbl'>Totaal:</div><div id='fw-total'>€ ".$total."</div></div>";
		            echo "</div>";
		        }
        ?>
			<div id="full-winkelmandje-afreken-icon-content">
			<?php 
		
			if ($_SESSION['winkelmandje'] != null) 
			{
				echo "<a href='payment'><div id='full-winkelmandje-afreken-icon' title='Afrekenen'></div></a>";
			}
			 
			?>
				
			</div>
        </div>
		<hr>
		<div id="pay-icon-center" class="clearfix">
			<div id='pay-icon-container' class="clearfix">
				<div class="pay-icon" id="paypal-icon"></div>
				<div class="pay-icon" id="mastercard-icon"></div>
				<div class="pay-icon" id="americanexpress-icon"></div>
			</div>
		</div>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
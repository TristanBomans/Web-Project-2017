<?php include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php"; ?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>WinkelMandje</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>
 		<div>
 		<?php
	 		if(isset($_SESSION['winkelmandje']))
		        {
		            echo "<div id='full-winkelmandje-content'>";
		            foreach ($_SESSION['winkelmandje'] as $product) 
		            {
		                echo "<div class='full-winkelmandje-content-lineitem'><div class='full-winkelmandje-content-naam'>".$product->naam."</div> <div class='full-winkelmandje-content-prijs'>€ ".$product->prijs. "</div><form action='../Controllers/RequestController.php' method='POST'><input type='submit' class='exit-icon-fw' value=''/><input type='hidden' name='productID' value='".$product->id."'/><input name='deleteProdWinkelMandje' type='hidden' value='true'/></form><div class='full-winkelmandje-content-besch'>".$product->beschrijving."</div></div>";

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
				echo "<a href='payement.php'><div id='full-winkelmandje-afreken-icon' title='Afrekenen'></div></a>";
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
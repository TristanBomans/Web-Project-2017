<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Admin Bestelling</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

 		<h1 id='bestellingen-titel-admin'>Bestellingen</h1>
		
		<?php 			
			$bestelMetInh = LogicController::getAllBestellingenMetInh();
			$totaal = 0;

			echo "<div id='bestellingen-content' class='clearfix'>";
			foreach ($bestelMetInh as $BMI) {
				$best = MainDAO::getBestelling($BMI[0]->bestelling_id);
				echo "<a href='admin-bestellingen.php?viewBest=".$BMI[0]->bestelling_id."'><div class='bestelling-lineitem clearfix' title='Bekijk bestelling'>";
				echo "<div class='bestelling-titel'>Bestelling</div>";
				echo "<div class='bestelling-datum'>".date("d-m-Y",strtotime($best->datum))."</div>";
				echo "<div class='bestelling-username'>".$best->username."</div>";
				echo "</div></a>";	
			}
			echo "</div>";
		?> 	


		<?php
		if (isset($_GET['viewBest'])) {
			$reqBest = MainDAO::getBestelling($_GET['viewBest']);
			$bestelInh = MainDAO::getBestellingInhoudBestelling($_GET['viewBest']);
			$total = 0;
			echo "<div id='pop-up-bestelling-parent'>";
			echo "<div id='pop-up-bestelling-content'>";		
			echo "<div id='pop-up-bestelling-banner'>".$reqBest->username.": ".date("d-m-Y",strtotime($reqBest->datum))."<a href='admin-bestellingen.php'><div id='exit-icon-admin'></div></a></div>";
			echo "<div id='pop-up-content-bestelling'>";

		foreach ($bestelInh as $IH ) {
			$prod = MainDAO::getProduct($IH->product_id);
			echo "<div class='bestel-popup-linitem clearfix'>";

			echo "<div class='bestel-popup-prod-naam'>".$prod->naam." (x ".$IH->aantal.")</div>";
			echo "<div class='bestel-popup-prod-cat'>".$prod->cat_naam."</div>";
			echo "<div class='bestel-popup-prod-prijs'>€ ".$prod->prijs * $IH->aantal."</div>";
			echo "</div>";
			$total += $prod->prijs * $IH->aantal;
		}

		echo "<div class='bestel-popup-linitem clearfix' id='popup-bestellingen-total'><div id='popup-bestelling-betaalmethode'>Betaalmethode: ".$reqBest->betaalmethode."</div><div class='bestel-popup-prod-prijs' >€ ".$total."</div></div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		}
		?>	
	
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
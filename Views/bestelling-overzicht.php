<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; 

	$reqBest = MainDAO::getBestelling($_GET['b']);

	if (isset($_GET['b'])) {
		if ($reqBest == null) {
				$_SESSION['mess'][sizeof($_SESSION['mess']) - 1] = "wem";
				Util::redirect("/");	
		}
		if (!($_SESSION['user']->username == $reqBest->username)) 
		{
			
			$_SESSION['mess'][sizeof($_SESSION['mess']) - 1] = "wu";
			Util::redirect("/");
		}
	}
	else{
		$_SESSION['mess'][sizeof($_SESSION['mess']) - 1] = "wem";
		Util::redirect("/");	
	}
?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/navbar.php"); ?>

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

		<?php
			$bestelInh = MainDAO::getBestellingInhoudBestelling($_GET['b']);
			$total = 0;		
			echo "<div id='bestelling-overzicht-banner'>".$reqBest->username.": ".date("d-m-Y",strtotime($reqBest->datum))."</div>";
			echo "<div id='content-bestelling-overzicht'>";
			foreach ($bestelInh as $IH ) {
				$prod = MainDAO::getProduct($IH->product_id);

				echo "<div class='bestel-overzicht-linitem clearfix'>";
				echo "<div class='bestel-popup-prod-naam'>".$prod->naam." (x ".$IH->aantal.")</div>";
				echo "<div class='bestel-popup-prod-cat'>".$prod->cat_naam."</div>";
				echo "<div class='bestel-popup-prod-prijs'>€ ".$prod->prijs * $IH->aantal."</div>";
				echo "</div>";

				$total += $prod->prijs * $IH->aantal;
			}

			echo "<div class='bestel-overzicht-linitem clearfix' id='popup-bestellingen-total'><div id='popup-bestelling-betaalmethode'>Betaalmethode: ".$reqBest->betaalmethode."</div><div class='bestel-popup-prod-prijs' >€ ".$total."</div></div>". "<br>". "<br>";
			
			echo "Facturatieadres: " . $reqBest->factuuradres . "<br>";
			echo "Leveradres: " . $reqBest->leveradres . "<br>";
			echo "Levermethode: " . $reqBest->levermethode . "<br>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		 ?>

		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/footer.php"); ?>
	</body>
</html>

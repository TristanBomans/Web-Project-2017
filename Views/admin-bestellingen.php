<?php 
	require_once "../Controllers/Util.php";
	require_once "../Controllers/LogicController.php";
	require_once "../Entities/UserEntity.php";
	require_once ("../Models/MainDAO.php");
	require_once ("../Entities/ProductEntity.php");

	if(!(isset($_SESSION)) ){
		session_start();
	}

	if (isset($_SESSION['user'])) 
	{
		if( $_SESSION['user']->authority != 1)
		{
			Util::redirect("http://localhost/Web-Project-2017/Views/");
		} 
	}
	else{
		Util::redirect("http://localhost/Web-Project-2017/Views/");
	}
?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 
 		<h1>Bestellingen</h1></div>
		<table style="padding: 10px;">
		<?php 			
			$bestelMetInh = LogicController::getAllBestellingenMetInh();
		

			$totaal = 0;
			foreach ($bestelMetInh as $BMI) {
				$best = MainDAO::getBestelling($BMI[0]->bestelling_id);
				// $i++;
				echo "<tr>";
				echo "<th>Bestelling van ".$best->username."</th></tr>";
				foreach ($BMI as $IH) {
					$prod = MainDAO::getProduct($IH->product_id);
					$totaal += $prod->prijs;
					echo "<tr><td style='color: red; text-decoration: underline;'>".$IH->id."</td>";
					echo "<td>". $prod->naam."</td>";
					echo "<td>€ ". $prod->prijs."</td></tr>";	
				}
				echo "<tr><td></td><td></td><td><b>€ ".$totaal."</b></td></tr>";	
				$totaal = 0;
	
			}
		?> 		
		</table>	
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
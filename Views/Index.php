<!doctype HTML>
<html lang="nl">
	<head>
	<title>Home</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
	<body class="container-fluid">
	<form action="../Controllers/RequestController" method="POST">
		<input type="hidden" name="test" value="xd">
		<input type="submit" name="submit" value="KRIJG U DATA XD" style="border: 1px solid black; display: block; width: 150px; border-radius: 20px; text-align: center; margin-top: 50px; background-color: green; font-family: 'comic sans ms'";>
	</form>
	<form action="../Controllers/RequestController" method="POST">
		<input type="hidden" name="winkelmandje" value="true">
		<input type="submit" name="submit" value="winkelmandje" onclick="cp()" style="border: 1px solid black; display: block; width: 150px; border-radius: 20px; text-align: center; margin-top: 50px; background-color: green; font-family: 'comic sans ms'">
	</form>

	<!-- <a href="./detail.php" style="border: 1px solid black; display: block; width: 150px; border-radius: 20px; text-align: center; margin-top: 50px; background-color: green; font-family: 'comic sans ms'">Detail Pagina</a> -->

	<?php 
	session_start();
	if (isset($_SESSION['winkelmandje']) == false) {
       $_SESSION['winkelmandje']  = [];
   	}
	var_dump($_SESSION['winkelmandje']);
    ?>

	<h1>Nieuwe: </h1><br>
	<div id="producten-nieuw" class="row">
		<?php
			require "../Controllers/LogicController.php";
			$Producten = LogicController::getAlleProducten();	
			$e = 4;
			if (sizeof($Producten) < 4){
				$e = sizeof($Producten);
			}							
			for ($i=0; $i < $e; $i++) { 
				$html = "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>"
					. "<div class='thumbnail'>"
					. "<img src='".$Producten[$i]->img_path."' alt='Deze afbeelding kon niet gevonden worden'>"
					. "<div class='caption'>"
					. "<h3>".$Producten[$i]->naam."</h3>"
					. "<p style='text-align: justify;'>".$Producten[$i]->beschrijving."</p>"
					."<p>".$Producten[$i]->datum_toegevoegd."</p>"
					. "</div>"
					. "</div>"
					. "</div>";
			 echo $html;
			}
		?>
	</div>
	<h1>Uitgelichte: </h1><br>
	<div id="producten-uitgelicht" class="row">
		<?php
		echo "";
		$Producten = LogicController::getAlleUitgelichteProducten();
		foreach ($Producten as $product) {
			$html = "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>"
				. "<div class='thumbnail'>"
				. "<img src='$product->img_path' alt='Deze afbeelding kon niet gevonden worden'>"
				. "<div class='caption'>"
				. "<h3>$product->naam</h3>"
				. "<p style='text-align: justify;'>$product->beschrijving</p>"
				."<p>".$product->datum_toegevoegd."</p>"
				. "</div>"
				. "</div>"
				. "</div>";
			 echo $html;
			}
		?>
	</div>
	</body>
</html>
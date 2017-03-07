<?php require_once "../Controllers/LogicController.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<?php include("partials/includes.php"); ?>
</head>
<body class="container-fluid">

	<?php include("partials/navbar.php"); ?>
	<div id='detailwrap'>
		<?php
		$product = LogicController::getProduct($_GET['opgevraagdProduct']);
		echo "<h1>".$product->naam."</h1>";
		echo "<p>".$product->beschrijving."</p>";
		echo "<b>".$product->datum_toegevoegd."</b>";
		?>

		<form>
			<h2>Schrijg een Review: </h2>
			<label>Rating: </label><input type="text" name="rating"><br>
			<label>Opmerking: </label><input type="text" name="rating"><br>

		</form>
	</div>
	<?php include("partials/footer.php"); ?>
</body>
</html>
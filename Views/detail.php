<?php require_once "../Controllers/ContentController.php";
require_once "../Controllers/LogicController.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<?php echo ContentController::getContent("all_pages-head_includes"); ?>
</head>
<body class="container-fluid">

	<?php echo ContentController::getContent("all_pages-header"); ?>

	<?php
	$product = LogicController::getProduct($_GET['opgevraagdProduct']);
	echo "<div id='detailwrap'><h1>".$product->naam."</h1>";
	echo "<p>".$product->beschrijving."</p>";
	echo "<b>".$product->datum_toegevoegd."</b></div>";
	?>




	<form>
		<h2>Schrijg een Review: </h2>
		<label>Rating: </label><input type="text" name="rating">
		<label>Opmerking: </label>	


	</form>
	<?php echo ContentController::getContent("all_pages-footer"); ?>
</body>
</html>
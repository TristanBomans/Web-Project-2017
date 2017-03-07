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
	echo "<div style='margin: auto; width: 50vw;'><h1>".$product->naam."</h1>";
	echo "<p>".$product->beschrijving."</p>";
	echo "<b>".$product->datum_toegevoegd."</b></div>";
	?>




	<form>
			


	</form>
	<?php echo ContentController::getContent("all_pages-footer"); ?>
</body>
</html>
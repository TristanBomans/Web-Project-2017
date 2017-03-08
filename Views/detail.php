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
		<div id="product-detail-wrapper">
			<?php
			$product = LogicController::getProduct($_GET['opgevraagdProduct']);
			$product->datum_toegevoegd =  explode("-",$product->datum_toegevoegd)[2]."-".explode("-",$product->datum_toegevoegd)[1]."-".explode("-",$product->datum_toegevoegd)[0];

			echo "<img src='".$product->img_path."' id='detail-img-product'></img>";
			echo "<div id='text-detail-product'>";
			echo "<h1>".$product->naam."</h1>";
			echo "<p class='p-styled-justify'>".$product->beschrijving."</p>";
			echo "<p id=detail-product-prijs> &euro; ".$product->prijs."<p>";
			echo "<b>".$product->datum_toegevoegd."</b></div>";
			?>
		</div>
		<div id='detailwrap-detail'>
			<form action="../Controllers/RequestController.php" method="POST">
				<h2 id="h2-login">Schrijf een Review: </h2>
				<div class="login-line-content">
					<p class="login-p">Rating: </p>
					<input type="text" name="rating" class="login-input">
				</div>
				<div class="login-line-content">
					<p class="login-p">Opmerking: </p>
					<input type="text" name="rating" class="login-input">
				</div>
				<div class="login-line-content-submit-button">
					<input type="submit" name="submit">
				</div>
			</form>
		</div>
	</div>
	<?php include("partials/footer.php"); ?>
</body>
</html>
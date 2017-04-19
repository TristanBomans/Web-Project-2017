<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([-1, 0, 1]); ?>
<?php 
if (isset($_GET['opgevraagdProduct']) != true) {
    $_SESSION['mess'][sizeof($_SESSION['mess'])] = "faultyProd";
	Util::redirect("/");
}
else{
	$OGproduct = LogicController::getProduct($_GET['opgevraagdProduct']); 
	if ($OGproduct == null) {
		$_SESSION['mess'][sizeof($_SESSION['mess'])] = "nonExProd";
		Util::redirect("/");
	}

	if ($OGproduct->active == 0) {
		if (isset($_GET['g']) != true) {
			if (isset($_SESSION['mess']) != true) {
				$_SESSION['mess'] = [];
			}
			$_SESSION['mess'][sizeof($_SESSION['mess'])+1] = "VerwijderdProd";
			// header('Location: '.$_SERVER['REQUEST_URI']."?g=x");
		}	
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Detail</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">
		
		<?php include("partials/navbar.php"); ?>

		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 
		
		<div id='detailwrap'>

			<?php include("partials/detail-product-data.php"); ?>	

		</div>

		<?php include("partials/review.php"); ?>

		<div id='vergelijkbare-producten' class="clearfix">
			<h2 id="h2-login">Vergelijkbare Producten:</h2>

			<?php include("partials/comparableProds.php"); ?>

		</div>

		<?php include("partials/footer.php"); ?>
		
	</body>
</html>
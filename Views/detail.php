<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([-1, 0, 1]); ?>

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
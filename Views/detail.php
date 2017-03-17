<?php 
include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php";
// require_once "../Controllers/LogicController.php";
if(!(isset($_SESSION)) ){
	session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<?php include("partials/includes.php"); ?>
</head>
<body class="container-fluid">
	<?php include("partials/navbar.php"); ?>
	<div id='detailwrap'>
		<?php include("partials/detail-product-data.php"); ?>
		<div id='vergelijkbare-producten' class="clearfix">
			<h2 id="h2-login">Vergelijkbare Producten:</h2>
			<?php include("partials/comparableProds.php"); ?>
		</div>


		<?php include("partials/review.php"); ?>
	</div>
	<?php include("partials/footer.php"); ?>
</body>
</html>
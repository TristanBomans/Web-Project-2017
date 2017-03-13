<?php require_once "../Controllers/LogicController.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<?php 
		include("partials/includes.php");
	?>
	
</head>
	<body class="container-fluid">

		<?php include("partials/navbar.php"); ?>
		
		<?php LogicController::loginRedirectCheck(); ?>
		
		<?php include("partials/loginForm.php"); ?>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
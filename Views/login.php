<?php require_once "../Controllers/LogicController.php";
	if(!(isset($_SESSION)) ){
		session_start();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php 
		include("partials/includes.php");
	?>
	
</head>
	<body class="container-fluid">

		<?php include("partials/navbar.php"); ?>

		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 
		
		<?php LogicController::loginRedirectCheck(); ?>
		
		<?php include("partials/loginForm.php"); ?>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
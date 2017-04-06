<?php 
require_once "../Controllers/LogicController.php";
require_once("../Entities/UserEntity.php");
	if(!(isset($_SESSION)) ){
		session_start();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

		<?php include("partials/navbar.php"); ?>

		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 
	
		<?php include("partials/registerForm.php"); ?>

		<?php include("partials/footer.php"); ?>
		
	</body>
</html>
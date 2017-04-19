<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([-1]); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
	<?php include("partials/includes.php"); ?>
	
</head>
	<body class="container-fluid">

		<?php include("partials/navbar.php"); ?>

		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 
		
		<?php LogicController::loginRedirectCheck(); ?>
		
		<?php include("partials/loginForm.php"); ?>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
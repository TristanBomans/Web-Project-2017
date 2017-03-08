<?php require_once "../Controllers/LogicController.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<?php include("partials/includes.php");
	// session_start();
	
	 ?>
	
</head>
	<body class="container-fluid">

		<?php include("partials/navbar.php"); 
		if(isset($_SESSION['user'])){
		$url = "location: http://localhost/Web-Project-2017/Views/index.php";
        header($url);
	}?>
		<div id='detailwrap-log-reg'>
			<form id="login-form" method="POST" action="../Controllers/RequestController.php">
				<h2 id="h2-login">Log in </h2>
				<div class="login-line-content">
					<p class="login-p">Gebruikersnaam: </p>
					<input required type="text" name="username" class='login-input'>
				</div>
				<div class="login-line-content">
					<p class="login-p">Wachtwoord: </p>
					<input required  type="password" name="password" class='login-input'>
				</div>
				<div class="login-line-content-submit-button">
					<input type="submit" name="submit">
				</div>
				<input type="hidden" name="typeRequest" value="loginuser">
			</form>
		</div>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
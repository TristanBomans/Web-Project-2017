<?php require_once "../Controllers/LogicController.php";?>

<!DOCTYPE html>
<html>
	<head>
		<title>detail</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

		<?php include("partials/navbar.php"); ?>
		<div id='detailwrap-log-reg'>
			<form id="login-form" method="POST" action="../Controllers/RequestController.php">
				<h2 id="h2-login">Registreren: </h2>
				<div class="login-line-content">
					<p class="login-p">Gebruiker: </p>
					<input type="text" name="username"  class='login-input'>
				</div>
				<div class="login-line-content">
					<p class="login-p">Wachtwoord: </p>
					<input type="password" name="password"  class='login-input'>
				</div>
				<div class="login-line-content">
					<p class="login-p">E-mail: </p>
					<input type="text" name="email"  class='login-input'>
				</div>
				<div class="login-line-content">
					<p class="login-p">Naam: </p>
					<input type="text" name="naam"  class='login-input'>
				</div>
				<div class="login-line-content">
					<p class="login-p">Voornaam: </p>
					<input type="text" name="voornaam"  class='login-input'>
				</div>
				<div class="login-line-content-submit-button">
					<input type="submit" name="submit">
				</div>
				<input type="hidden" name="typeRequest" value="registeruser">
			</form>
		</div>

		<?php include("partials/footer.php"); ?>
		
	</body>
</html>
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
			<form>
				<h2>Register: </h2>
				<label>User: </label><input type="text" name="username">
				<label>Password: </label><input type="text" name="password">
				<label>E-mail: </label><input type="text" name="email">
				<label>Naam: </label><input type="text" name="naam">
				<label>Voornaam: </label><input type="text" name="voornaam">
			</form>
		</div>

		<?php include("partials/footer.php"); ?>
		
	</body>
</html>
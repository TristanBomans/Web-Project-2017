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
			<form id="login-form">
				<h2>Log in </h2>
				<div class="login-line-content">
					<p class="login-p">User: </p>
					<input type="text" name="username" class='login-input'>
				</div>
				<div class="login-line-content">
					<p class="login-p">Password: </p>
					<input type="text" name="password" class='login-input'>
				</div>
				<div class="login-line-content-submit-button">
					<input type="submit" name="submit">
				</div>
			</form>
		</div>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
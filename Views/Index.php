<?php require_once "../Controllers/ContentController.php"; ?>
<!doctype HTML>
<html lang="nl">
	<head>
	<title>Home</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
	<body class="container-fluid">
		<div style="margin-top: 20px; margin-bottom: 10px;">
			<form action="../Controllers/RequestController" method="POST">
				<input type="hidden" name="test" value="xd">
				<input type="submit" name="submit" value="Test" class="btn btn-default btn-lg" style="float: left; margin-right: 5px;">
			</form>
			<form action="../Controllers/RequestController" method="POST">
				<input type="hidden" name="winkelmandje" value="true">
				<input type="submit" name="submit" value="Winkelmand" class="btn btn-default btn-lg">
			</form>
		</div>

		<?php session_start();
		if (isset($_SESSION['winkelmandje']) == false) {$_SESSION['winkelmandje']  = [];}
		var_dump($_SESSION['winkelmandje']); ?>

		<h1>Nieuwe: </h1><br>
		<div id="producten-nieuw" class="row">
			<?php echo ContentController::getContent("home-producten-nieuw"); ?>
		</div>
		<h1>Uitgelichte: </h1><br>
		<div id="producten-uitgelicht" class="row">
			<?php echo ContentController::getContent("home-producten-uitgelicht"); ?>
		</div>
	</body>
</html>
<?php require_once "../Controllers/ContentController.php"; ?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php echo ContentController::getContent("all_pages-head_includes"); ?>
	</head>
	<body class="container-fluid">

		<?php echo ContentController::getContent("all_pages-header"); ?>

		<div style="margin-top: 20px; margin-bottom: 10px;">
			<form action="../Controllers/RequestController" method="POST">
				<input type="hidden" name="test" value="xd">
				<input id="test-knop" type="submit" name="submit" value="Test" class="btn btn-default btn-lg">
			</form>
			<form action="../Controllers/RequestController" method="POST">
				<input type="hidden" name="winkelmandje" value="true">
				<input type="submit" name="submit" value="Winkelmand" class="btn btn-default btn-lg">
			</form>
		</div>

		<?php session_start();
		if (isset($_SESSION['winkelmandje']) == false) {$_SESSION['winkelmandje']  = [];}
		var_dump($_SESSION['winkelmandje']); ?>

		<h1>Nieuw: </h1><br>
		<div id="producten-nieuw" class="row">
			<?php echo ContentController::getContent("home-producten-nieuw"); ?>
		</div>
		<h1>Uitgelicht: </h1><br>
		<div id="producten-uitgelicht" class="row">
			<?php echo ContentController::getContent("home-producten-uitgelicht"); ?>
		</div>

		<?php echo ContentController::getContent("all_pages-footer"); ?>

	</body>
</html>
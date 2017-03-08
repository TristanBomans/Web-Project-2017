<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>
 		
		<h1>Nieuw: </h1><br>
		<div id="producten-nieuw" class="row">
			<?php include("partials/home-producten-nieuw.php"); ?>
		</div>
		<h1>Uitgelicht: </h1><br>
		<div id="producten-uitgelicht" class="row">
			<?php include("partials/home-producten-uitgelicht.php"); ?>
		</div>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
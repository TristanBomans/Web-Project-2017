
 <?php include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php"; ?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>
 		
		<div id="allproducts-wrapper">
			<div id="allproducts-title">Nieuw: </div>
		</div>
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
<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([-1, 0, 1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/navbar.php"); ?>

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

		<div id="allproducts-wrapper">
			<div id="allproducts-title">Nieuw: </div>
		</div>
		<div id="producten-nieuw" class="row">

			<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/home-producten-nieuw.php"); ?>

		</div>
		<h1>Uitgelicht: </h1><br>
		<div id="producten-uitgelicht" class="row">

			<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/home-producten-uitgelicht.php"); ?>

		</div>

		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/footer.php"); ?>
		
	</body>
</html>
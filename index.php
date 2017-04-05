
 <?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/navbar.php"); ?>

 		<?php 
		
		if (isset($_GET['err'])) {
			if ($_GET['err'] == 'nli') {
				echo "<div id='errloginwrap'><div id='login-err' class='clearfix'>U dient in te loggen voor deze actie kan uitvoeren.</div></div>";
			}
		}?>

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
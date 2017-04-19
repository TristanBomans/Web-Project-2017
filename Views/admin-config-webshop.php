<?php  include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Admin Webshop Config</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

 		<div id='config-wrapper-admin'>
 			<div id='configuratie-titel'>Configuratie</div>
			<form method="POST" action="/Controllers/RequestController">
				<div>
					<div>Website naam: <i class="schuine-tekst"> De naam die vanboven te zien is</i></div>
					<input required type="text" name="wsnaam" value="<?php echo $Configuratie->naam_ws; ?>">
				</div>
				<div>
					<div>Aantal uitgelichte producten: <i class="schuine-tekst">Het aantal uitgelichte producten dat op de homepagina te zien zijn</i></div>
					<input required type="number" name="wsup" id='wsup' value='<?php echo $Configuratie->aantal_up; ?>'>
				</div>
				<input type="submit" name="" class="submit-btn-payment">
				<input type="hidden" name="changewsconfig">
			</form>
		</div>
	
		<?php include("partials/footer.php"); ?>
	</body>
</html>
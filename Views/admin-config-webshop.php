<?php 
 include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";

	if(!(isset($_SESSION)) ){
		session_start();
	}

	if (isset($_SESSION['user'])) 
	{
		if( $_SESSION['user']->authority != 1)
		{
			Util::redirect("/");
		} 
	}
	else{
		Util::redirect("/");
	}
?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>Admin Webshop Config</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 

 		<div id='config-wrapper-admin'>
 			<div id='configuratie-titel'>Configuratie</div>
			<form method="POST" action="/Controllers/RequestController">
				<div>
					<div>Website naam: <i class="schuine-tekst"> De naam die vanboven te zien is</i></div>
					<input type="text" name="wsnaam">
				</div>
				<input type="submit" name="" class="submit-btn-payment">
				<input type="hidden" name="changewsname">
			</form>
		</div>
			

			<!-- <?php $number_of_users = count(scandir(ini_get("session.save_path"))) - 2; echo $number_of_users;?> -->
		<?php include("partials/footer.php"); ?>

	</body>
</html>
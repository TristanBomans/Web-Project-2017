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
 		<h1 id='bestellingen-titel-admin'>Configuratie</h1>
		<form>
		<div><div>Website mail: <i> Waar Naar de mails worden gestuurd</i></div><input type="text" name="adminmail"></div>
		</form>
	
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
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
		<title>Admin</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">
 		<?php include("partials/navbar.php"); ?> 
		<h1>Admin</h1>
		<div class="row">
			<a href="admin-product"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Producten</div></a>
			<a href="admin-category"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Categorieën</div></a>
			<a href="admin-bestellingen"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Bestellingen</div></a>
			<a href="admin-contact"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Berichten</div></a>
			<a href="admin-users"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Gebruikers</div></a>
			<a href="admin-config-webshop"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Configuratie</div></a>
		</div>
		<div id="margin-div"></div>
		<?php include("partials/footer.php"); ?>
	</body>
</html>
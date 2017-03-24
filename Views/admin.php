<?php 
	// require_once "../Controllers/Util.php";
	// require_once "../Entities/UserEntity.php";
 include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php";
 
	if(!(isset($_SESSION)) ){
		session_start();
	}

	if (isset($_SESSION['user'])) 
	{
		if( $_SESSION['user']->authority != 1)
		{
			Util::redirect("http://localhost/Web-Project-2017/Views/");
		} 
	}
	else{
		Util::redirect("http://localhost/Web-Project-2017/Views/");
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
 		<!-- <div id="detailwrap"> -->
			<h1>Admin</h1>
			<div class="row">
				<a href="http://localhost/Web-Project-2017/Views/admin-product"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Producten</div></a>
				<a href="http://localhost/Web-Project-2017/Views/admin-category"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Categorieën</div></a>
				<a href="http://localhost/Web-Project-2017/Views/admin-bestellingen"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Bestellingen</div></a>
				<a href="http://localhost/Web-Project-2017/Views/admin-contact"><div class='col-lg-3 col-md-3 col-sm-5 col-xs-10 admin-icons'>Berichten</div></a>
			</div>
		<!-- </div> -->
		<?php include("partials/footer.php"); ?>

	</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([-1, 0, 1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>403</title>
		<?php include( $_SERVER['DOCUMENT_ROOT']."/Views/partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include( $_SERVER['DOCUMENT_ROOT']."/Views/partials/navbar.php"); ?>

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

 		<img class='error-img' src="/Resources/403.png">

		<?php include( $_SERVER['DOCUMENT_ROOT']."/Views/partials/footer.php"); ?>

	</body>
</html>
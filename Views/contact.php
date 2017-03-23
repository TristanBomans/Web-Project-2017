 <?php include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php"; 
if (!(isset($_SESSION['user']))) 
	{
		Util::redirect("http://localhost/Web-Project-2017/Views/");	
	}
 ?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>Contact</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>
 		
		<div id="contact-container">
			<form action="../Controllers/RequestController.php" method="post">
			<div id="titlebar-contact">Bericht Versturen</div>

			<div id="contact-content">
				<div><div class="contact-title">Onderwerp: </div><input type="text" name="subject" required></div>
				<div><div class="contact-title">Bericht: </div><textarea id="conact-textarea" name="message" required></textarea> </div>
				<input type="submit" id="contact-submit">
				<input type="hidden" name="contactSend" value="true">
			</div>
			</form>
		</div>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
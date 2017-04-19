 <?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?> 
<?php Util::authorisation([0, 1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Contact</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 
 		
		<div id="contact-container">
			<form action="../Controllers/RequestController.php" method="post">
			<div id="titlebar-contact">Bericht Versturen</div>

			<div id="contact-content">
				<div><div class="contact-title">Onderwerp: </div><input type="text" name="subject" required></div>
				<div><div class="contact-title">Bericht: </div><textarea id="conact-textarea" name="message" required></textarea></div>
				<input type="submit" id="contact-submit">
				<input type="hidden" name="contactSend" value="true">
			</div>
			</form>
		</div>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
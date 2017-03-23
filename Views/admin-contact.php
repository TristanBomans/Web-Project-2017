<?php 
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
		<title>Admin Contact</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 

 		<h1 id='bestellingen-titel-admin'>Berichten: </h1>
		
		<?php 			
			$berichten = MainDAO::getAllContact();
			$totaal = 0;

			echo "<div id='bestellingen-content' class='clearfix'>";

			foreach ($berichten as $bericht) {
				echo "<a href='http://localhost/Web-Project-2017/Views/admin-contact.php?viewMess=".$bericht->id."'><div class='bestelling-lineitem clearfix' title='Bekijk bericht'>";
				echo "<div class='bestelling-titel'>Bericht</div>";
				echo "<div class='bestelling-datum'>".date("d-m-Y",strtotime($bericht->datum))."</div>";
				echo "<div class='bestelling-username'>".$bericht->username."</div>";
				echo "</div></a>";	
			}
			echo "</div>";
		?> 	


		<?php
		if (isset($_GET['viewMess'])) {
			$berichten = MainDAO::getAllContact();
			$reqBericht = null;
			foreach ($berichten as $bericht) {
				if ($bericht->id == $_GET['viewMess'] ) {
					$reqBericht = $bericht;
				}
			}

	
			echo "<div id='pop-up-bestelling-parent'>";
			echo "<div id='pop-up-bestelling-content'>";		
			echo "<div id='pop-up-bestelling-banner'>".$reqBericht->username.": ".date("d-m-Y",strtotime($reqBericht->datum))."<a href='http://localhost/Web-Project-2017/Views/admin-contact.php'><div id='exit-icon-admin'></div></a></div>";


			echo "<div id='contact-content'>
				<div><div class='contact-title'>Onderwerp: </div><input type='text' name='subject' value='".$reqBericht->subject."' disabled></div>
				<div><div class='contact-title'>Bericht: </div><textarea id='conact-textarea' name='message' disabled>".$reqBericht->message."</textarea> </div>
	
			</div>";


			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
		?>	
	
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
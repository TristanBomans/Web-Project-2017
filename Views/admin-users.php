<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Admin Gebruikers</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

 		<div id="admin-main-content">
				<div id="admin-edit-content">
					<div id='selecteer-item-titel'><h1>Gebruikers: </h1></div>
						<?php 
							$allusers = LogicController:: getAllUsers();
							foreach ($allusers as $singleU) {
								$woord = "Gebruiker";
								if ($singleU->authority==1) {
									$woord = "Admin";
								}
								
								echo "<a class='a-admin-edit' href='?editUser=".$singleU->username."'><div title='Bewerk deze Gebruiker'class='admin-edit-lineitem'><b>".$woord.": </b>".$singleU->username."</div></a>";	
							}
						?> 
					</div>	
		</div>


		 <?php if (isset($_GET['editUser'])) {
			$requestedEditUser = MainDAO::getUser($_GET['editUser']);

			echo "<div id='admin-parent-edit-selected-product'>";
			echo "<div id='admin-edit-selected-product'>";
			echo "<div id='banner-popup-admin'>Bewerk ".$requestedEditUser->username."<a href='admin-users'><div id='exit-icon-admin'></div></a></div>";

			echo "<div id='pop-up-content'>";
	
			echo "<form action='../Controllers/RequestController.php' method='POST' enctype='multipart/form-data'>";

			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Naam:</div><input required class='input-popup' type='text' name='naam' value='".$requestedEditUser->naam."'></div>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Voornaam:</div><input required class='input-popup' type='text' name='voornaam' value='".$requestedEditUser->voornaam."'></div>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>E-mail adres:</div><input required class='input-popup' type='email' name='emailadres' value='".$requestedEditUser->emailadres."'></div>";

			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Bevoegdheid:</div>";

			echo "<select class='input-popup' name='authority'>";
		
			if ($requestedEditUser->authority == 0) {
				echo "<option selected class='input-popup' type='text' value='0'>User</input>";
				echo "<option class='input-popup' type='text' value='1'>Administrator</input>";
			}
			else{
				echo "<option class='input-popup' type='text' value='0'>User</input>";
				echo "<option selected class='input-popup' type='text' value='1'>Administrator</input>";
			}
			echo "</select></div>";
			echo "<input type='hidden' name='toEditUser' value='".$requestedEditUser->username."'>";
			echo "<input type='hidden' name='editUser' value='true'>";
			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><input id='pop-up-sumbit' type='submit'></div>";
			echo "</form>";
			echo "</div>";
			echo "</div></div>";
		} ?>
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
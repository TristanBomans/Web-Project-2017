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
		<title>Admin Product</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 
 		<div id="admin-main-content">
			
				<div id="admin-edit-content">
				<div id='selecteer-item-titel'><h1>Selecteer je product</h1></div>
				
					<?php 
						echo "<a href='admin-product?newProd=#'><div id='add-item-icon'></div>";
					
						$optChangeProd = LogicController:: getAlleProducten();
						foreach ($optChangeProd as $CP) {
							echo "<div class='prod-adm-topwrapper'><a class='a-admin-edit' href='admin-product?editProd=".$CP->id."'><div class='wrapper-product-admin'><div title='Bewerk dit product'class='admin-edit-lineitem'>".$CP->naam."</div></div></a><a href='/Controllers/RequestController?deleteProd=".$CP->id."'><div class='deleteprodicon' title='verwijder ".$CP->naam."'></div></a></div>";	
						}
					?> 
				</div>	
		</div>


		<?php if (isset($_GET['editProd'])) {
			$requestedEditProd = LogicController::getProduct($_GET['editProd']);
			$categorien = LogicController::getAllCategorien();
			$tempc = new CategorieEntity($requestedEditProd->cat_naam);
			$categorien = Util::unsetValue($categorien, $tempc);


			echo "<div id='admin-parent-edit-selected-product'>";
			echo "<div id='admin-edit-selected-product'>";
			echo "<div id='banner-popup-admin'>".$requestedEditProd->naam."<a href='admin-product'><div id='exit-icon-admin'></div></a></div>";

			echo "<div id='pop-up-content'>";
			echo "<form action='../Controllers/RequestController.php' method='POST' enctype='multipart/form-data'>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Naam:</div><input class='input-popup' type='text' name='naam' value='".$requestedEditProd->naam."'></div>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Prijs:</div><input class='input-popup' type='text' name='prijs' value='".$requestedEditProd->prijs."'></div>";


			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Categorie:</div>";


			echo "<select class='input-popup' name='categorie'>";
			echo "<option selected class='input-popup' type='text' value='".$requestedEditProd->cat_naam."'>".$requestedEditProd->cat_naam."</input>";
			foreach ($categorien as $catt) {
				echo "<option class='input-popup' type='text' value='".$catt->naam."'>".$catt->naam."</input>";
			}
			

			echo "</select></div>";

			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Uitgelicht:</div>";
			echo "<select class='input-popup' name='uitgelicht'>";
			if ($requestedEditProd->uitgelicht == 0){
				echo "<option selected class='input-popup' type='text' value='0'>Nee</input>";
				echo "<option class='input-popup' type='text' value='1'>Ja</input>";
			}
			else{
				echo "<option class='input-popup' type='text' value='0'>Nee</input>";
				echo "<option selected class='input-popup' type='text' value='1'>Ja</input>";
			}
			
			
			echo "</select></div>";


			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><div class='popup-label'>Beschrijving:</div><textarea name='beschrijving' class='input-popup' id='input-popup-beschrijving' type='text'>".$requestedEditProd->beschrijving."</textarea></div>";

			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-img'><div class='popup-label'>Afbeelding:</div><img id='img-editprod' src='".$requestedEditProd->img_path."'><input name='file' type='file' /></div>";

			echo "<input type='hidden' name='id' value='".$requestedEditProd->id."'>";
			echo "<input type='hidden' name='editProduct' value='true'>";
			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><input id='pop-up-sumbit' type='submit'></div>";


			echo "</form>";
			echo "</div>";
			

			echo "</div></div>";
		} ?>

		<?php if (isset($_GET['newProd'])) {
			$categorien = LogicController::getAllCategorien(); 

			echo "<div id='admin-parent-edit-selected-product'>";
			echo "<div id='admin-edit-selected-product'>";
			echo "<div id='banner-popup-admin'>Nieuw Product<a href='admin-product'><div id='exit-icon-admin'></div></a></div>";

			echo "<div id='pop-up-content'>";
			echo "<form action='../Controllers/RequestController.php' method='POST' enctype='multipart/form-data'>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Naam:</div><input class='input-popup' type='text' name='naam'></div>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Prijs:</div><input class='input-popup' type='text' name='prijs'></div>";


			echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>Categorie:</div>";


			echo "<select class='input-popup' name='categorie'>";
			foreach ($categorien as $catt) {
				echo "<option class='input-popup' type='text' value='".$catt->naam."'>".$catt->naam."</input>";
			}
			

			echo "</select></div>";



			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><div class='popup-label'>Beschrijving:</div><textarea name='beschrijving' class='input-popup' id='input-popup-beschrijving' type='text'></textarea></div>";

			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-img clearfix'><div class='popup-label'>Afbeelding:</div><img id='img-editprod' src='../Resources/dummypng.png'><input name='file' type='file' /></div>";

			echo "<input type='hidden' name='newDBProd' value='#'>";
			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><input id='pop-up-sumbit' type='submit'></div>";


			echo "</form>";
			echo "</div>";
			

			echo "</div></div>";
		} ?>
		
			
				
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
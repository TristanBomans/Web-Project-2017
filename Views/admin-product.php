<?php 
	require_once "../Controllers/Util.php";
	require_once "../Controllers/LogicController.php";
	require_once "../Entities/UserEntity.php";
	require_once ("../Models/MainDAO.php");
	require_once ("../Entities/ProductEntity.php");

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
		<title>AdminProduct</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 
 		<div id="admin-main-content">
			
				<div id="admin-edit-content">
				<div id='selecteer-item-titel'><h1>Selecteer je product</h1></div>
				
					<?php 
						echo "<a href='http://localhost/Web-Project-2017/Views/admin-product.php?newProd=#'><div id='add-item-icon'></div>";
					
						$optChangeProd = LogicController:: getAlleProducten();
						foreach ($optChangeProd as $CP) {
							echo "<a class='a-admin-edit' href='http://localhost/Web-Project-2017/Views/admin-product.php?editProd=".$CP->id."'><div title='Bewerk dit product'class='admin-edit-lineitem'>".$CP->naam."</div></a>";	
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
			echo "<div id='banner-popup-admin'>".$requestedEditProd->naam."<a href='http://localhost/Web-Project-2017/Views/admin-product.php'><div id='exit-icon-admin'></div></a></div>";

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
			echo "<div id='banner-popup-admin'>Nieuw Product<a href='http://localhost/Web-Project-2017/Views/admin-product.php'><div id='exit-icon-admin'></div></a></div>";

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
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
		<title>Home</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 
 		<div id="admin-main-content">
			
				<div id="admin-edit-content">
				<div id='selecteer-item-titel'><h1>Selecteer je product</h1></div>
					<?php 
					
						$optChangeProd = LogicController:: getAlleProducten();
						foreach ($optChangeProd as $CP) {
							echo "<a class='a-admin-edit' href='http://localhost/Web-Project-2017/Views/admin-product.php?editProd=".$CP->id."'><div title='Bewerk dit product'class='admin-edit-lineitem'>".$CP->naam."</div></a>";	
						}
					?> 
				</div>	
		</div>


		<?php if (isset($_GET['editProd'])) {
			$requestedEditProd = LogicController::getProduct($_GET['editProd']);
			echo "<div id='admin-parent-edit-selected-product'>";
			echo "<div id='admin-edit-selected-product'>";
			echo "<div id='banner-popup-admin'>".$requestedEditProd->naam."<a href='http://localhost/Web-Project-2017/Views/admin-product.php'><div id='exit-icon-admin'></div></a></div>";
			
			
			echo "<div id='pop-up-content'>";
			echo "<form action='../Controllers/RequestController.php' method='POST'>";
			echo "<div class='pop-up-edit-lineitem'><div class='popup-label'>Naam:</div><input class='input-popup' type='text' name='naam' value='".$requestedEditProd->naam."'></div>";

			echo "<div class='pop-up-edit-lineitem'><div class='popup-label'>Prijs:</div><input class='input-popup' type='text' name='prijs' value='".$requestedEditProd->prijs."'></div>";

			echo "<div class='pop-up-edit-lineitem'><div class='popup-label'>Categorie:</div><input class='input-popup' type='text' name='categorie' value='".$requestedEditProd->cat_naam."'></div>";

			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving'><div class='popup-label'>Beschrijving:</div><textarea name='beschrijving' class='input-popup' id='input-popup-beschrijving' type='text'>".$requestedEditProd->beschrijving."</textarea></div>";

			echo "<input type='hidden' name='id' value='".$requestedEditProd->id."'>";
			echo "<input type='hidden' name='editProduct' value='true'>";
			echo "<input id='pop-up-sumbit' type='submit'>";


			echo "</form>";
			echo "</div>";
			

			echo "</div></div>";
		} ?>
		
			
				
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
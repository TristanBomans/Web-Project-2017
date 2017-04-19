<?php  include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([1]); ?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Admin Categorie</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?> 

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 
 		
 		<div id="admin-main-content">
			
				<div id="admin-edit-content">
				<div id='selecteer-item-titel'><h1>Categorieën:</h1></div>
				
					<?php 
						echo "<a href='/Views/admin-category.php?newCat=#'><div id='add-item-icon'></div>";
					
						$allCategorieën = LogicController:: getAllCategorien();
						foreach ($allCategorieën as $categorie) {
							echo "<div class='prod-adm-topwrapper'><a class='a-admin-edit' href='/Views/admin-category?editCat=".$categorie->naam."'><div class='wrapper-product-admin'><div title='Bewerk dit product'class='admin-edit-lineitem'>".$categorie->naam."</div></div></a><a href='/Controllers/RequestController?deleteCat=".$categorie->naam."'><div class='deleteprodicon' title='verwijder ".$categorie->naam."'></div></a></div>";	
						}
					?> 
				</div>	
		</div>


		<?php if (isset($_GET['editCat'])) {
			$categorien = LogicController::getAllCategorien();
			


			echo "<div id='admin-parent-edit-selected-product'>";
			echo "<div id='admin-edit-selected-product'>";
			echo "<div id='banner-popup-admin'>".$_GET['editCat']."<a href='/Views/admin-category'><div id='exit-icon-admin'></div></a></div>";

			echo "<div id='pop-up-content'>";
			echo "<form action='../Controllers/RequestController.php' method='POST'>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div id='cat-naam-inp' class='popup-label'>Naam:</div><input class='input-popup' type='text' name='naam' value='".$_GET['editCat']."'></div>";
			

			echo "<input required type='hidden' name='editCatName' value='".$_GET['editCat']."'>";
			echo "<input type='hidden' name='editCat' value='true'>";
			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><input id='pop-up-sumbit' type='submit'></div>";


			echo "</form>";
			echo "</div>";
			

			echo "</div></div>";
		} ?> 

		<?php if (isset($_GET['newCat'])) {
			echo "<div id='admin-parent-edit-selected-product'>";
			echo "<div id='admin-edit-selected-product'>";
			echo "<div id='banner-popup-admin'>Nieuwe Categorie<a href='/Views/admin-category.'><div id='exit-icon-admin'></div></a></div>";

			echo "<div id='pop-up-content'>";
			echo "<form action='../Controllers/RequestController.php' method='POST'>";
			echo "<div class='pop-up-edit-lineitem clearfix'><div id='cat-naam-inp' class='popup-label'>Naam:</div><input required class='input-popup' type='text' name='naam' value=''></div>";
			
			echo "<input type='hidden' name='newCat' value='true'>";
			echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><input id='pop-up-sumbit' type='submit'></div>";


			echo "</form>";
			echo "</div>";
			

			echo "</div></div>";
		} ?>
		
			
				
			
		<?php include("partials/footer.php"); ?>

	</body>
</html>
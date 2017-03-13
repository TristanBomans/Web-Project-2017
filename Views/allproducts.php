<!doctype HTML>
<html lang="nl">
	<head>
		<title>Home</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">
 		<?php include("partials/navbar.php"); ?>	
		<div id="allproductsandsort-wrapper">
			<div id="allproductsandsort-title">Alle producten: </div>
			

			<div id="allproductsandsort-filteren">Filteren
				<div id='allproductsandsort-dropdown-filt'>
					<form action="../Controllers/RequestController.php" method="POST">
					<b>Filteren op:</b><br>
					
					<?php 
						require_once ("../Models/MainDAO.php");
						$cats = MainDAO::getAllCategorien();
						
						foreach ($cats as $cat) {
							echo "<div class='allproductsandsort-dropdown-line-item-filt' value='".$cat->naam."'><input type='checkbox' name='".$cat->naam."' value='".$cat->naam."'> ".$cat->naam."</div>";					
						}
					?>
					<input type="hidden" name="Filteren" value="true">
					<input type='submit'>
					</form>
					
				</div>
			</div>

			<div id="allproductsandsort-sorteren">Sorteren
				<div id='allproductsandsort-dropdown'>
					<div class="allproductsandsort-dropdown-line-item" id="categorie-asc">Categorie oplopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="categorie-desc">Categorie aflopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="datum-asc">Datum oplopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="datum-desc">Datum aflopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="naam-asc">Naam oplopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="naam-desc">Naam aflopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="prijs-asc">Prijs oplopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="prijs-desc">Prijs aflopend</div>	
					<div class="allproductsandsort-dropdown-line-item" id="rating-asc">Beoordeling oplopend</div>
					<div class="allproductsandsort-dropdown-line-item" id="rating-desc">Beoordeling aflopend</div>			
				</div>
			</div>
		</div>
		<div id="producten-alle" class="row">
			<?php include("partials/alleproducts-producten-all.php"); ?>
		</div>
		<?php include("partials/footer.php"); ?>
	</body>
</html>
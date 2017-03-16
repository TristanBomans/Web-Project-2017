<!doctype HTML>
<html lang="nl">
	<head>
		<title>AllProducts</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">
 		<?php include("partials/navbar.php"); ?>	
		<div id="allproducts-wrapper">
			<div id="allproducts-title">Alle producten: </div>
			<div id="allproducts-filteren">Filteren
			<div id='allproducts-dropdown-filter'>
				<form action="../Controllers/RequestController.php" method="POST">
					<b>Filteren op:</b><br>
					<?php 
						require_once ("../Controllers/LogicController.php");
						LogicController::outputFilterDropdown();
					?>
					<input type="hidden" name="Filteren" value="true">
					<input type='submit'>
				</form>
			</div>
		</div>
		<div id="allproducts-sort">Sorteren
			<div id='allproducts-dropdown-sort'>
				<div class="allproducts-dropdown-lineitem-sort" id="categorie-asc">Categorie oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="categorie-desc">Categorie aflopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="datum-asc">Datum oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="datum-desc">Datum aflopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="naam-asc">Naam oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="naam-desc">Naam aflopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="prijs-asc">Prijs oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="prijs-desc">Prijs aflopend</div>	
				<div class="allproducts-dropdown-lineitem-sort" id="rating-asc">Beoordeling oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="rating-desc">Beoordeling aflopend</div>			
			</div>
		</div>
	</div>
	<div id="producten-alle" class="row">
		<?php include("partials/alleproducts-producten-all.php"); ?>
	</div>
		<?php include("partials/footer.php"); ?>
	</body>
</html>
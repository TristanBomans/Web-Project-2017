<div id="product-detail-wrapper">
	<?php
	$product = LogicController::getProduct($_GET['opgevraagdProduct']);
	$product->datum_toegevoegd =  explode("-",$product->datum_toegevoegd)[2]."-".explode("-",$product->datum_toegevoegd)[1]."-".explode("-",$product->	datum_toegevoegd)[0];
	
	echo "<img src='".$product->img_path."' id='detail-img-product'></img>";
	echo "<div id='text-detail-product'>";
	echo "<h1>".$product->naam."</h1>";
	echo "<p class='p-styled-justify'>".$product->beschrijving."</p>";
	echo "<p id=detail-product-prijs> &euro; ".$product->prijs."<p>";
	echo "<div class='wrapper-date-cat'><b>".$product->datum_toegevoegd."</b></div>";
	echo "<b class='thumb-categorie'>".$product->cat_naam."</b></div>";
	?>
</div>
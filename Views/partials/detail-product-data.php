<!-- <div id="product-detail-wrapper"> -->
	<?php
	$OGproduct = LogicController::getProduct($_GET['opgevraagdProduct']);
	$product = $OGproduct;
	$product->datum_toegevoegd =  explode("-",$product->datum_toegevoegd)[2]."-".explode("-",$product->datum_toegevoegd)[1]."-".explode("-",$product->datum_toegevoegd)[0];
	
	echo "<div id='product-img-sc-wrapper'><img src='".$product->img_path."' id='detail-img-product'>";



echo "<form action='/Controllers/RequestController.php' method='POST'>";
echo"<input type='hidden' name='toAddProduct' value='".$product->id."'>";
echo "<input type='submit' id='detailAddShoppingCart' value='' class='winkelwagen-add' title='Voeg toe aan winkelmandje'>";
echo "<div class='product-metadata-id metadata'>".$product->id."</div>";
echo "<div class='product-metadata-naam metadata'>".$product->naam."</div>";
echo "<div class='product-metadata-prijs metadata'>".$product->prijs."</div>";
if ($product->avg_rating != 0) {
	echo "<div class='product-rating-icon'>".$product->avg_rating."</div>";
}





echo "</form></div>";
 // echo "<div id='detailAddShoppingCart'></div></form></div>";


	echo "<div id='text-detail-product'>";
	echo "<h1 id='h1-naam-detail'>".$product->naam."</h1>";
	echo "<p class='p-styled-justify'>".$product->beschrijving."</p>";
	echo "<p id=detail-product-prijs> &euro; ".$product->prijs."<p>";
	echo "<div class='wrapper-date-cat'><b>".$product->datum_toegevoegd."</b></div>";
	echo "<b class='thumb-categorie'>".$product->cat_naam."</b></div>";
	?>
<!-- </div> -->
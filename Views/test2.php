<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/includes.php"); ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>


<form action="../Views/test2" method="POST">
	<input type="" id ="search" name="keyWord">
	<input type="hidden" name="productZoeken" value="true">
	<input type="submit" name="submit">
</form>

<?php 
if (isset($_POST['productZoeken'])) {
	// echo "true";
    $alleprod = LogicController::getAlleProducten();
    $returnArr = [];
   
    foreach ($alleprod as $prod) {
       if (strpos($prod->naam, $_POST['keyWord'] ) !== false) {
            array_push($returnArr, $prod);
            // echo "xd";
       }
    }

    $producten = $returnArr;

    $html = "";
    
    for ($i=0; $i < sizeof($producten) ; $i++) {

        $html .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 parent-thumb-cont'>"
         . "<div class='thumbnail thumb-cont'>"
         . "<div class='thumb-cont-money-circle'>€ ".$producten[$i]->prijs."</div>"
         . "<img src='".$producten[$i]->img_path."'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
         . "<div class='caption'>"
         . "<h3>".$producten[$i]->naam."</h3>"
         . "<div class='wrapper-date-cat'><b>".date("d-m-Y",strtotime($producten[$i]->datum_toegevoegd))."</b>"
         . "<b class='thumb-categorie'>".$producten[$i]->cat_naam."</b></div>"
         . "<a value='Detail' class='btn btn-default btn-lg btn-detail' href='".URL."Views/detail?opgevraagdProduct=".$producten[$i]->id."'>Detail</a>"
         . "</div>"   
         . "</div>"
         . "<form action='../Controllers/RequestController.php' method='POST'>"
         . "<input type='hidden' name='toAddProduct' value='".$producten[$i]->id."'>"
         . "<input type='submit' value='' class='winkelwagen-btn winkelwagen-add' title='Voeg toe aan winkelmandje'>";
          if ($producten[$i]->avg_rating != 0) {
            $html .= "<div class='product-rating-icon'>".$producten[$i]->avg_rating."</div>";
          }
         $html.= "</form>"
         . "<div class='product-metadata-id metadata'>".$producten[$i]->id."</div>"
         . "<div class='product-metadata-naam metadata'>".$producten[$i]->naam."</div>"
         . "<div class='product-metadata-prijs metadata'>".$producten[$i]->prijs."</div>"
         . "</div>";
     }
     echo $html;



}


?>
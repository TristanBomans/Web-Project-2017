<?php
require_once "../Controllers/LogicController.php";
require_once "../Controllers/Util.php";

    $Tproducten = LogicController::getComparableProducts($product->cat_naam);
    $product->datum_toegevoegd =  explode("-",$product->datum_toegevoegd)[2]."-".explode("-",$product->datum_toegevoegd)[1]."-".explode("-",$product->datum_toegevoegd)[0];

    $Tproducten = Util::unsetValue($Tproducten,$product);
   
    $html = "";
    $e = 4;
    $producten = [];

    if (sizeof($Tproducten) < 4){$e = sizeof($Tproducten);}

   // $producten = Util::randomize($Tproducten, 4);
    shuffle($Tproducten);
    $producten = array_slice($Tproducten,0,4);
    
   foreach ($producten as $productt)
    {
        $productt->datum_toegevoegd =  explode("-",$productt->datum_toegevoegd)[2]."-".explode("-",$productt->datum_toegevoegd)[1]."-".explode("-",$productt->datum_toegevoegd)[0];
        
        $html .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 parent-thumb-cont clearfix'>"
         . "<div class='thumbnail thumb-cont'>"
         . "<div class='thumb-cont-money-circle'>€ ".$productt->prijs."</div>"
         . "<img src='".$productt->img_path."'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
         . "<div class='caption'>"
         . "<h3>".$productt->naam."</h3>"
         . "<div class='wrapper-date-cat'><b>".$productt->datum_toegevoegd."</b>"
         . "<b class='thumb-categorie'>".$productt->cat_naam."</b></div>"
         . "<form action='../Controllers/RequestController.php' method='GET' class='form-btn-detail'>"
         . "<input type='hidden' name='opgevraagdProduct' value='".$productt->id."'>"
         . "<input type='submit' value='Detail' class='btn btn-default btn-lg btn-detail'>"
         . "</form>"
         . "</div>"   
         . "</div>"
         . "<form action='../Controllers/RequestController.php' method='POST'>"
         . "<input type='hidden' name='toAddProduct' value='".$productt->id."'>"
         . "<input type='submit' value='' class='winkelwagen-btn winkelwagen-add' title='Voeg toe aan winkelmandje'>"
         ."</form>"
         . "<div class='product-metadata-id metadata'>".$productt->id."</div>"
         . "<div class='product-metadata-naam metadata'>".$productt->naam."</div>"
         . "<div class='product-metadata-prijs metadata'>".$productt->prijs."</div>"
         . "</div>";
    }
    echo $html;
    ?>
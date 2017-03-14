<?php
    require_once "../Controllers/LogicController.php";

    if(!isset($_SESSION['filterData'])){
        $producten = LogicController::getAlleProducten();
    }
    else{
        $producten = $_SESSION['filterData'];
    }
    
    $html = "";

    for ($i=0; $i < sizeof($producten) ; $i++) {
        $producten[$i]->datum_toegevoegd =  explode("-",$producten[$i]->datum_toegevoegd)[2]."-".explode("-",$producten[$i]->datum_toegevoegd)[1]."-".explode("-",$producten[$i]->datum_toegevoegd)[0];

        $html .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 parent-thumb-cont'>"
         . "<div class='thumbnail thumb-cont'>"
         . "<div class='thumb-cont-money-circle'>€ ".$producten[$i]->prijs."</div>"
         . "<img src='".$producten[$i]->img_path."'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
         . "<div class='caption'>"
         . "<h3>".$producten[$i]->naam."</h3>"
         . "<div class='wrapper-date-cat'><b>".$producten[$i]->datum_toegevoegd."</b>"
         . "<b class='thumb-categorie'>".$producten[$i]->cat_naam."</b></div>"
         . "<form action='../Controllers/RequestController.php' method='GET'>"
         . "<input type='hidden' name='opgevraagdProduct' value='".$producten[$i]->id."'>"
         . "<input type='submit' value='Detail' class='btn btn-default btn-lg btn-detail'>"
         . "</form>"
         . "</div>"   
         . "</div>"
         . "<form action='../Controllers/RequestController.php' method='POST'>"
         . "<input type='hidden' name='toAddProduct' value='".$producten[$i]->id."'>"
         . "<input type='submit' value='' class='winkelwagen-btn winkelwagen-add' title='Voeg toe aan winkelmandje'>"
         . "</form>"
         . "<div class='product-metadata-id metadata'>".$producten[$i]->id."</div>"
         . "<div class='product-metadata-naam metadata'>".$producten[$i]->naam."</div>"
         . "<div class='product-metadata-prijs metadata'>".$producten[$i]->prijs."</div>"
         . "</div>";
     }
     echo $html;
 ?>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";
    $producten = LogicController::getAlleProducten();
    $html = "";
    $e = 4;

    if (sizeof($producten) < 4){$e = sizeof($producten);}

    for ($i=0; $i < $e; $i++) 
    {

        $html .= "<a href='/Views/detail?opgevraagdProduct=".$producten[$i]->id."'><div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 parent-thumb-cont'>"
         . "<div class='thumbnail thumb-cont'>"
         . "<div class='thumb-cont-money-circle'>€ ".round($producten[$i]->prijs, 1)."</div>"
         . "<img src='".$producten[$i]->img_path."'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
         . "<div class='caption'>"
         . "<h3>".$producten[$i]->naam."</h3>"
         . "<div class='wrapper-date-cat'><b>".date("d-m-Y",strtotime($producten[$i]->datum_toegevoegd))."</b>"
         . "<b class='thumb-categorie'>".$producten[$i]->cat_naam."</b></div>"
         . "</form>"
         . "</div>"   
         . "</div>"
         . "<form action='/Controllers/RequestController.php' method='POST'>"
         . "<input type='hidden' name='toAddProduct' value='".$producten[$i]->id."'>"
         . "<input type='submit' value='' class='winkelwagen-btn winkelwagen-add' title='Voeg toe aan winkelmandje'>"
         . "<div class='product-metadata-id metadata'>".$producten[$i]->id."</div>"
         . "<div class='product-metadata-naam metadata'>".$producten[$i]->naam."</div>"
         . "<div class='product-metadata-prijs metadata'>".$producten[$i]->prijs."</div>";
         if ($producten[$i]->avg_rating != 0) {
            $html .= "<div class='product-rating-icon'>".round($producten[$i]->avg_rating, 1)."</div>";
         }
         $html .=""
         . "</form>"
         . "</div></a>";
    }
    echo $html;
 ?>
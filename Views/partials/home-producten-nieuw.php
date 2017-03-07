   
<?php
    require_once "../Controllers/LogicController.php";

    $producten = LogicController::getAlleProducten();
    $html = "";
    $e = 4;

    if (sizeof($producten) < 4){$e = sizeof($producten);}

    for ($i=0; $i < $e; $i++) {
     $html .= "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6 parent-thumb-cont'>"
         . "<div class='thumbnail thumb-cont'>"
         . "<img src='".$producten[$i]->img_path."'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
         . "<div class='caption'>"
         . "<h3>".$producten[$i]->naam."</h3>"
         . "<p class='p-styled-justify'>".$producten[$i]->beschrijving."</p>"
         . "<b>".$producten[$i]->datum_toegevoegd."</b>"
         . "<form action='../Controllers/RequestController.php' method='GET'>"
         . "<input type='hidden' name='opgevraagdProduct' value='".$producten[$i]->id."'>"
         . "<input type='submit' value='Detail' class='btn btn-default btn-lg'>"
         . "</form>"
         . "</div>"   
         . "</div>"
         . "<form action='../Controllers/RequestController.php' method='POST'>"
         . "<input type='hidden' name='toAddProduct' value='".$producten[$i]->id."'>"
         . "<input type='submit' value='' class='winkelwagen-btn' title='Voeg toe aan winkelmandje'>"
         ."</form>"
         . "</div>";
     }
     echo $html;
 ?>
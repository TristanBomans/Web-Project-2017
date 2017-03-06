<?php
require_once "../Controllers/LogicController.php";
class ContentController
{
 static public function getContent($type){
     switch ($type) {
         case "home-producten-nieuw":
             $Producten = LogicController::getAlleProducten();
             $html = "";
             $e = 4;

             if (sizeof($Producten) < 4){$e = sizeof($Producten);}

             for ($i=0; $i < $e; $i++) {
                 $html .= "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>"
                     . "<div class='thumbnail'>"
                     . "<img src='".$Producten[$i]->img_path."' alt='Deze afbeelding kon niet gevonden worden'>"
                     . "<div class='caption'>"
                     . "<h3>".$Producten[$i]->naam."</h3>"
                     . "<p style='text-align: justify;'>".$Producten[$i]->beschrijving."</p>"
                     . "<p>".$Producten[$i]->datum_toegevoegd."</p>"
                     . "</div>"
                     . "</div>"
                     . "</div>";
             }
             return $html;
             break;
         case "home-producten-uitgelicht":
             $Producten = LogicController::getAlleUitgelichteProducten();
             $html = "";
             foreach ($Producten as $product) {
                 $html .= "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>"
                     . "<div class='thumbnail'>"
                     . "<img src='$product->img_path' alt='Deze afbeelding kon niet gevonden worden'>"
                     . "<div class='caption'>"
                     . "<h3>$product->naam</h3>"
                     . "<p style='text-align: justify;'>$product->beschrijving</p>"
                     . "<p>" . $product->datum_toegevoegd . "</p>"
                     . "</div>"
                     . "</div>"
                     . "</div>";
             }
             return $html;
             break;
         case 2:
             echo "i equals 2";
             break;
     }

 }
}


?>
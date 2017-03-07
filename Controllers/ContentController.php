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
         case "all_pages-header":
             $html = "<div id='Titelbar' class='page-header red'><h1>Webshop</h1></div>"
            ."<div class='container-fluid'>"
            ."<ul class='nav nav-tabs nav-justified'>"
            ."<li role='presentation' class='active'><a href='#'>Home</a></li>"
            ."<li role='presentation'><a href='#'>Alle Producten</a></li>"
            ."<li role='presentation'><a href='#'>Profiel</a></li>"
            ."</ul>"
            ."</div>";
             return $html;
            break;
         case "all_pages-head_includes":
            $html = ".<!-- Nodig voor Bootstrap & JQuery--> <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>"
            ."<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>"
            ."<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>"
            ."<!--Eigen Styles & Scripts-->"
            ."<script src='../Scripts/WebShopScript.js'></script>"
            ."<link rel='stylesheet' href='../Stylesheets/WebShop.css'>";
             return $html;
             break;
     }

 }
}


?>
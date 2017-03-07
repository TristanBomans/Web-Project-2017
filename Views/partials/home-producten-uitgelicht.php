<?php
$producten = LogicController::getAlleUitgelichteProducten();
$html = "";
foreach ($producten as $product) {
 $html .= "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>"
     . "<div class='thumbnail thumb-cont'>"
     . "<img src='$product->img_path'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
     . "<div class='caption'>"
     . "<h3>$product->naam</h3>"
     . "<p style='text-align: justify;'>$product->beschrijving</p>"
     . "<b>" . $product->datum_toegevoegd . "</b>"
     . "</div>"
     . "</div>"
     . "</div>";
}
echo $html;
?>
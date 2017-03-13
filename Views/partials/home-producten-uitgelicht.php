<?php
	require_once "../Controllers/LogicController.php";

    $Tproducten = LogicController::getAlleUitgelichteProducten();
    $html = "";
    $e = 4;
    $producten = [];

    if (sizeof($Tproducten) < 4){$e = sizeof($Tproducten);}

    $randomIndexes = [];
    $randomIndex;

   for ($i=0; $i < 4; $i++) { 
        $randomIndex = rand(0,sizeof($Tproducten)-1);
        while (in_array($randomIndex, $randomIndexes)) {
            $randomIndex = rand(0,sizeof($Tproducten)-1);
        }
        array_push($randomIndexes, $randomIndex);                  
    }

    for ($i=0; $i < sizeof($Tproducten) ; $i++) { 
        if (in_array($i, $randomIndexes)) {
            array_push($producten, $Tproducten[$i]);
        }
    }

   
    
    for ($i=0; $i < $e; $i++) 
    {
        $producten[$i]->datum_toegevoegd =  explode("-",$producten[$i]->datum_toegevoegd)[2]."-".explode("-",$producten[$i]->datum_toegevoegd)[1]."-".explode("-",$producten[$i]->datum_toegevoegd)[0];
        
        $html .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 parent-thumb-cont'>"
         . "<div class='thumbnail thumb-cont'>"
         . "<div class='thumb-cont-money-circle'>€ ".$producten[$i]->prijs."</div>"
         . "<img src='".$producten[$i]->img_path."'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
         . "<div class='caption'>"
         . "<h3>".$producten[$i]->naam."</h3>"
         . "<div class='wrapper-date-cat'><b>".$producten[$i]->datum_toegevoegd."</b>"
         . "<b class='thumb-categorie'>".$producten[$i]->cat_naam."</b></div>"
         . "<form action='../Controllers/RequestController.php' method='GET' class='form-btn-detail'>"
         . "<input type='hidden' name='opgevraagdProduct' value='".$producten[$i]->id."'>"
         . "<input type='submit' value='Detail' class='btn btn-default btn-lg btn-detail'>"
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
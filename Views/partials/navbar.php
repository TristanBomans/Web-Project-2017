<?php require_once "../Entities/ProductEntity.php" ?>
<div id='titelbar'>
    <div id="titelbar-tekst">Webshop</div>
</div>
<div class="container-fluid">
    <ul class="nav nav-pills" id="parent-winkelmandje-dropdown">
        <li role="presentation" class="navpils"><a href="http://localhost/Web-Project-2017/Views/" class="navpils-color">Home</a></li>
        <li role="presentation" class="navpils"><a href='#' class="navpils-color">Alle Producten</a></li>
        <li role="presentation" class="navpils"><a href='#' class="navpils-color">Profiel</a></li>
       
        <div id="instellingen-dropdown" title="Instellingen">
            <div id="instellingen-dropdown-content">
                <a class="link-dropdown-instellingen" href="http://localhost/Web-Project-2017/Views/login.php"><div class="instellingen-dropdown-content-line-item">Aanmelden</div></a>
                <a class="link-dropdown-instellingen" href="http://localhost/Web-Project-2017/Views/register.php"><div class="instellingen-dropdown-content-line-item">Registreren</div></a>
            </div>
        </div>
        <div id="winkelmandje-dropdown">
            <div id="winkelmandje-dropdown-content"><b>Winkelmandje</b>
            <?php
            $total = 0;
            session_start();
            if(isset($_SESSION['winkelmandje'])){
                foreach ($_SESSION['winkelmandje'] as $product) {
                    echo "<div class='individuele-item-div-dropdown'><p class='naam-product-dropdown'>".$product->naam."</p> <p class='prijs-product-dropdown'>€ ".$product->prijs. "</p></div>";
                    $total += $product->prijs;
                }
            }
            else{
                $_SESSION['winkelmandje']  = [];
            }
            echo "<hr><div class='individuele-item-div-dropdown'><p  class='naam-product-dropdown'>Totaal: </p><p class='prijs-product-dropdown'><b>€ ".$total."</b></p></div>";
            ?>

            </div>
        </div>
    </ul>
</div>
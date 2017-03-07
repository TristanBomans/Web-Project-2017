<?php require_once "../Entities/ProductEntity.php" ?>
<div id='Titelbar' class='page-header red'><h1>Webshop</h1></div>
    <div class="container-fluid">
    <ul class="nav nav-pills" id="parent-winkelmandje-dropdown">
        <li role="presentation"><a href="http://localhost/Web-Project-2017/Views/">Home</a></li>
        <li role="presentation"><a href='#'>Alle Producten</a></li>
        <li role="presentation"><a href='#'>Profiel</a></li>
       
        <div id="instellingen-dropdown" title="Instellingen">
            <div id="instellingen-dropdown-content">
                <div class="instellingen-dropdown-content-line-item"><a class="link-dropdown-instellingen" href="http://localhost/Web-Project-2017/Views/login.php">Aanmelden</a></div>
                <div class="instellingen-dropdown-content-line-item"><a class="link-dropdown-instellingen" href="http://localhost/Web-Project-2017/Views/register.php">Registreren</a></div>
            </div>
        </div>
        <div id="winkelmandje-dropdown">
            <div id="winkelmandje-dropdown-content"><b>Winkelmandje</b>
            <?php
            $total = 0;
            session_start();
            // var_dump($_SESSION['winkelmandje']);
            if(isset($_SESSION['winkelmandje'])){
                foreach ($_SESSION['winkelmandje'] as $product) {
                    echo "<div class='individuele-item-div-dropdown'><p  class='naam-product-dropdown'>".$product->naam."</p> <p class='prijs-product-dropdown'>€ ".$product->prijs. "</p></div>";
                    $total += $product->prijs;
                }
            }
            echo "<hr><div class='individuele-item-div-dropdown'><p  class='naam-product-dropdown'>Totaal: </p><p class='prijs-product-dropdown'><b>€ ".$total."</b></p></div>";
            ?>

            </div>
        </div>
    </ul>
</div>
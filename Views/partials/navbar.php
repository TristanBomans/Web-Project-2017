<?php    

    include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";
    
    if(!(isset($_SESSION)) ){
        session_start();
    }
?>

<div id='titelbar'>
    <div id="titelbar-tekst">Webshop</div>
</div>
<div class="container-fluid">
    <ul class="nav nav-pills" id="parent-winkelmandje-dropdown">
        <li role="presentation" class="navpils"><a href="/" class="navpils-color">Home</a></li>
        <li role="presentation" class="navpils"><a href='/Views/allproducts' class="navpils-color">Alle Producten</a></li>
        <?php 
        if(isset($_SESSION['user'])){
            echo  "<li role='presentation' class='navpils'><a href='/Views/profile' class='navpils-color'>Profiel</a></li>";
        }
        ?>
       
        <div id="instellingen-dropdown" title="Instellingen">
            <div id="instellingen-dropdown-content">         
           <?php
                if(isset($_SESSION['user']))
                {
                    echo "<a class='link-dropdown-instellingen'><div class='instellingen-dropdown-content-line-item' id='instellingen-dropdown-content-line-item-username'>Welkom ".$_SESSION['user']->username."</div></a>";
                    echo "<a class='link-dropdown-instellingen' href='/Controllers/RequestController.php?action=logout'><div class='instellingen-dropdown-content-line-item'>Afmelden</div></a>";
                    if($_SESSION['user']->authority == 1){
                     echo "<a class='link-dropdown-instellingen' href='/Views/admin'><div class='instellingen-dropdown-content-line-item'>Admin menu</div></a>";     
                    }
                    echo "<a class='link-dropdown-instellingen' href='/Views/contact'><div class='instellingen-dropdown-content-line-item'>Neem contact op</div></a>";
                } 
                else
                {
                    echo "<a class='link-dropdown-instellingen' href='/Views/login'><div class='instellingen-dropdown-content-line-item'>Aanmelden</div></a>";
                    echo "<a class='link-dropdown-instellingen' href='/Views/register'><div class='instellingen-dropdown-content-line-item'>Registreren</div></a>";
                }
                ?>
            </div>
        </div>
        

        <div id="winkelmandje-dropdown">
            <div id="winkelmandje-dropdown-content"><b>Winkelmandje</b>
            <?php
            $total = 0;
            
            if(isset($_SESSION['winkelmandje']))
            {
                echo "<div id='winkelmandje-items' class='clearfix'>";
                foreach ($_SESSION['winkelmandje'] as $product) 
                {
                    echo "<div class='individuele-item-div-dropdown clearfix'><p class='naam-product-dropdown'>".$product->naam."</p> <p class='prijs-product-dropdown'>€ ".$product->prijs. "</p></div>";
                    $total += $product->prijs;
                }
                echo "</div>";
            }
            else{
                $_SESSION['winkelmandje']  = [];
            }
            echo "<div class='individuele-item-div-dropdown' id='prijs-totaal-rand'><p  class='naam-product-dropdown'>Totaal: </p><p class='prijs-product-dropdown'><b id='winkelmandje-totalprice'>€ ".$total."</b></p></div>";
            ?>
                <div  class="individuele-item-div-dropdown clearfix">
                <br>
                   
                </div>
             <div id="meer-detail-invoeg"> <a id ='winkelmandje-dropdown-meer-detail'  href="/Views/winkelmandje-full">Meer detail</a>
                   </div>   
            </div>
        </div>
    </ul>
</div>
<?php    

    include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";
    
    if(!(isset($_SESSION)) ){
        session_start();
    }
 
    if (isset($_SESSION['user']) != true) {
        if (isset($_COOKIE['WebShopCookie'])) {
            $user = unserialize($_COOKIE['WebShopCookie']);
            $auth = MainDAO::getUser($user->username);
            if ($auth == $user ) {
                $_SESSION['user'] = $auth;
            }
        }
    }



?>
<?php
$Configuratie = MainDAO::getWSConfig();
?>
<div id='titelbar'>
    <div id="titelbar-tekst"><?php echo $Configuratie->naam_ws; ?></div>
</div>
<div class="container-fluid">
    <ul class="nav nav-pills" id="parent-winkelmandje-dropdown">
        <li role="presentation" class="navpils"><a href="/" class="navpils-color">Home</a></li>
        <li role="presentation" class="navpils"><a href='/Views/allproducts' class="navpils-color">Alle Producten</a></li>
        <?php 
        if(isset($_SESSION['user'])){
            echo  "<li role='presentation' class='navpils'><a href='/Views/user?u=".$_SESSION['user']->username."' class='navpils-color'>Profiel</a></li>";
        }
        ?>
       
        <div id="instellingen-dropdown" title="Instellingen">
            <div id="instellingen-dropdown-content">         
           <?php
                $html = "";
                if(isset($_SESSION['user']))
                {
                    $html .= "<a class='link-dropdown-instellingen'><div class='instellingen-dropdown-content-line-item' id='instellingen-dropdown-content-line-item-username'>Welkom ".$_SESSION['user']->username."</div></a>";
                    $html .= "<a class='link-dropdown-instellingen' href='/Controllers/RequestController.php?action=logout'><div class='instellingen-dropdown-content-line-item'>Afmelden</div></a>";

                    if($_SESSION['user']->authority == 1){
                        $html .= "<a class='link-dropdown-instellingen' href='/Views/admin'><div class='instellingen-dropdown-content-line-item'>Admin menu</div></a>";     
                    }
                    $html .= "<a class='link-dropdown-instellingen' href='/Views/user-bestellingen'><div class='instellingen-dropdown-content-line-item'>Uw bestellingen</div></a>";
                    $html .= "<a class='link-dropdown-instellingen' href='/Views/contact'><div class='instellingen-dropdown-content-line-item'>Neem contact op</div></a>";
                } 
                else
                {
                    $html .= "<a class='link-dropdown-instellingen' href='/Views/login'><div class='instellingen-dropdown-content-line-item'>Aanmelden</div></a>";   
                    $html .= "<a class='link-dropdown-instellingen' href='/Controllers/FacebookControl.php?fb=x'><div class='instellingen-dropdown-content-line-item'>Aanmelden met Facebook</div></a>";
                    $html .= "<a class='link-dropdown-instellingen' href='/Views/register'><div class='instellingen-dropdown-content-line-item'>Registreren</div></a>";
                }

               
                echo $html;
                ?>
            </div>
        </div>
        

        <div id="winkelmandje-dropdown">
            <div id='add-green-icon'></div>

            <div id="winkelmandje-dropdown-content"><b>Winkelmandje</b>
            <?php
            $total = 0;
            
            echo "<div id='winkelmandje-items' class='clearfix'>";
            if(isset($_SESSION['winkelmandje']))
            {
                foreach ($_SESSION['winkelmandje'] as $product) 
                {
                    $aantal = $_SESSION['aantallen'][$product->id];
                    echo "<div class='individuele-item-div-dropdown clearfix'><p class='naam-product-dropdown'>".$product->naam." <i id='".$product->id."'>(x".$aantal.")</i></p> <p class='prijs-product-dropdown' id='prijs-".$product->id."'>€ ".$product->prijs*$aantal. "</p></div>";
                    $deelPrijs = $product->prijs * $aantal;
                    $total += $deelPrijs;
                }
                
            } 
            else{
                $_SESSION['winkelmandje']  = [];
            }
            echo "</div>";
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
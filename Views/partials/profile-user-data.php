<?php 
    
    if(!isset($_SESSION['user']))
    {
        header("location: /");
    }
    echo "<h1 id='profile-h1'>".$_SESSION['user']->username."</h1>";
    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Naam: ".$_SESSION['user']->naam."</div><a href='profile?edit=naam'><div class='edit-icon-profile'></div></a></div>";
    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Voornaam: ".$_SESSION['user']->voornaam."</div><a href='profile?edit=voornaam'><div class='edit-icon-profile'></div></a></div>";
    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Email: ".$_SESSION['user']->emailadres."</div><a href='profile?edit=emailadres'><div class='edit-icon-profile'></div></a></div>";
    if ($_SESSION['user']->authority == 0)
    {
        echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Bevoegdheid: Normale gebruiker</div></div>";
    }
    elseif($_SESSION['user']->authority == 1)
    {
        echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Bevoegdheid: Administrator</div></div>";
    }

   if (isset($_GET['edit'])) {
    
            echo "<div id='admin-parent-edit-selected-product'>";
            echo "<div id='admin-edit-selected-product'>";
            echo "<div id='banner-popup-admin'>".ucfirst($_GET['edit'])." bewerken<a href='profile'><div id='exit-icon-admin'></div></a></div>";

            echo "<div id='pop-up-content'>";
            echo "<form action='../Controllers/RequestController.php' method='POST'>";
            echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>".ucfirst($_GET['edit']).":</div><input class='input-popup' type='text' name='toEditUserdata' value='".$_SESSION['user']->$_GET['edit']."'></div>";
           
            echo "<input type='hidden' name='editUserData' value='".$_GET['edit']."'>";
            echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><input id='pop-up-sumbit' type='submit'></div>";


            echo "</form>";
            echo "</div>";
            

            echo "</div></div>";
        } 


?>
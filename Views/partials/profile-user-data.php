<?php 
    if(!isset($_SESSION['user']))
    {
        header("location: http://localhost/Web-Project-2017/Views/index.php");
    }
    echo "<h1>".$_SESSION['user']->username."</h1>";
    echo "<p>Naam: ".$_SESSION['user']->naam."</p>";
    echo "<p>Voornaam: ".$_SESSION['user']->voornaam."</p>";
    if ($_SESSION['user']->authority == 0)
    {
        echo "<p>Bevoegdheid: Normale gebruiker</p>";
    }
    elseif($_SESSION['user']->authority == 1)
    {
        echo "<p>Bevoegdheid: Administrator</p>";
    }
?>
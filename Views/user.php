<?php  
include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; 
if(!(isset($_SESSION)) ){
    session_start();
} 
?>

<!doctype HTML>
<html lang="nl">
	<head>
		<title>Profile</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>
        <div id="profilewrap" class="clearfix">
            
                <div id="text-detail-product" class="clearfix">
                  <?php 
                    if (!(isset($_GET['u']))) {
                        util::redirect("/");
                    }
                    $user = MainDAO::getUser($_GET['u']);
                    echo "<h1 id='profile-h1'>".$user->username."</h1>";
                    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Naam: ".$user->naam."</div></div>";
                    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Voornaam: ".$user->voornaam."</div></div>";
                    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Email: ".$user->emailadres."</div></div>";
                    if ($user->authority == 0)
                    {
                        echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Bevoegdheid: Normale gebruiker</div></div>";
                    }
                    elseif($user->authority == 1)
                    {
                        echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Bevoegdheid: Administrator</div></div>";
                    }

                ?>             
                </div>	
                
        </div>
        <?php include("partials/footer.php"); ?>
	</body>
</html>
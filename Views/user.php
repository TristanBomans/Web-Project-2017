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
                    $zelfdeuser = false;
                    if (!(isset($_GET['u']))) {
                        util::redirect("/");
                       
                    }
                    else{
                        if (MainDAO::getUser($_GET['u']) == null) {
                            util::redirect("/");
                        }
                        if (isset($_SESSION['user'])) {
                            if ($_SESSION['user']->username == $_GET['u']) {
                                $zelfdeuser = true;
                            }
                        }
                      
                    }

                    $user = MainDAO::getUser($_GET['u']);

                    if ($user->img_path == "0" || $user->img_path == "" ) {
                        $user->img_path = "/Resources/dummypng.png";
                    }


                    echo "<h1 id='profile-h1'>".$user->username."</h1>";
                    echo "<img id='usr-img-pic' src='".$user->img_path."'>";

                    echo "<div id='user-wrapper-text'>";

                    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Naam: ".$user->naam."</div>";
                    if($zelfdeuser == true){ echo "<a href='".$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI']."&edit=naam'><div class='edit-icon-profile'></div></a>";}
                    echo "</div>";

                    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Voornaam: ".$user->voornaam."</div>";
                    if($zelfdeuser == true){ echo "<a href='".$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI']."&edit=voornaam'><div class='edit-icon-profile'></div></a>";}
                    echo "</div>";

                    echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Email: ".$user->emailadres."</div>";
                    if($zelfdeuser == true){ echo "<a href='".$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI']."&edit=emailadres'><div class='edit-icon-profile'></div></a>";}
                    echo "</div>";


                    if ($user->authority == 0)
                    {
                        echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Bevoegdheid: Normale gebruiker</div></div>";
                    }
                    elseif($user->authority == 1)
                    {
                        echo "<div class='profile-lineitem clearfix'><div class='profile-label'>Bevoegdheid: Administrator</div></div>";
                    }
                    echo "</div>";






                   if (isset($_GET['edit'])) {
                    
                        echo "<div id='admin-parent-edit-selected-product'>";
                        echo "<div id='admin-edit-selected-product'>";
                        echo "<div id='banner-popup-admin'>".ucfirst($_GET['edit'])." bewerken<a href='user?u=".$_GET['u']."'><div id='exit-icon-admin'></div></a></div>";

                        echo "<div id='pop-up-content'>";
                        echo "<form action='../Controllers/RequestController.php' method='GET'>";
                        echo "<div class='pop-up-edit-lineitem clearfix'><div class='popup-label'>".ucfirst($_GET['edit']).":</div><input class='input-popup' type='text' name='toEditUserdata' value='".$_SESSION['user']->$_GET['edit']."'></div>";
                       
                        echo "<input type='hidden' name='editUserdataPuser' value='".$_GET['edit']."'>";
                        echo "<div class='pop-up-edit-lineitem pop-up-edit-lineitem-beschrijving clearfix'><input id='pop-up-sumbit' type='submit'></div>";


                        echo "</form>";
                        echo "</div>";
                        

                        echo "</div></div>";
                    } 
                ?>             
                </div>	
                
        </div>
        <?php include("partials/footer.php"); ?>
	</body>
</html>
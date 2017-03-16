<?php  
require_once("../Entities/UserEntity.php"); 
require_once("../Entities/ProductEntity.php"); 
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
        <div id="detailwrap">
            <div id="product-detail-wrapper">
                <div id="text-detail-product">
                  <?php include("partials/profile-user-data.php"); ?>               
                </div>	
                
            </div>
        </div>
        <?php include("partials/footer.php"); ?>
	</body>
</html>
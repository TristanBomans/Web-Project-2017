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
                  <?php include("partials/profile-user-data.php"); ?>               
                </div>	
                
        </div>
        <?php include("partials/footer.php"); ?>
	</body>
</html>
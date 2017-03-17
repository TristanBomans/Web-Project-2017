<?php include $_SERVER['DOCUMENT_ROOT']."/Web-Project-2017/namespaces.php"; ?>
<!doctype HTML>
<html lang="nl">
	<head>
		<title>WinkelMandje</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">

 		<?php include("partials/navbar.php"); ?>
 		<div>
 		<?php
	 		if(isset($_SESSION['winkelmandje']))
		        {
		            echo "<div id='full-winkelmandje-content'>";
		            foreach ($_SESSION['winkelmandje'] as $product) 
		            {
		                echo "<div class='full-winkelmandje-content-lineitem'><div class='full-winkelmandje-content-naam'>".$product->naam."</div> <div class='full-winkelmandje-content-prijs'>€ ".$product->prijs. "</div><div class='exit-icon-fw'></div><div class='full-winkelmandje-content-besch'>".$product->beschrijving."</div></div>";

		                echo "<hr class='hr-winkelmandje-full'>";


		                $total += $product->prijs;
		            }
		            echo "<div class='full-winkelmandje-content-lineitem clearfix'><div id='fw-total-lbl'>Totaal:</div><div id='fw-total'>€ ".$total."</div></div>";
		            echo "</div>";
		        }
        ?>
        </div>

		<?php include("partials/footer.php"); ?>

	</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; ?>
<?php Util::authorisation([-1, 0, 1]); ?>
 
<!doctype HTML>
<html lang="nl">
	<head>
		<title>Alle Producten</title>
		<?php include("partials/includes.php"); ?>
	</head>
	<body class="container-fluid">
 		<?php include("partials/navbar.php"); ?>

 		<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/errormess.php"); ?> 

		<div id="allproducts-wrapper">
			<div id="allproducts-title">Alle producten: </div>
			<div id='aantal-items-page'>
				<form name="g">
					<?php 
						if (!(isset($_POST['productZoeken']))) {
							if (!(isset($_SESSION['selectedCats']))) {
								echo "<select id='select-pages'>";
								if (isset($_GET['g'])) {
									switch ($_GET['g']) {
										case '5':
											echo '<option selected value="5">5</option><option value="10">10</option><option value="15">15</option><option value="all">all</option>';
											break;
										case '10':
											echo '<option value="5">5</option><option selected value="10">10</option><option value="15">15</option><option value="all">all</option>';
											break;
										case '15':
											echo '<option value="5">5</option><option value="10">10</option><option selected value="15">15</option><option value="all">all</option>';
										break;
										
										default:
											echo '<option value="5">5</option><option value="10">10</option><option value="15">15</option><option selected value="all">all</option>';
										break;
									}
								}
								else{
									echo '<option value="5">5</option><option selected value="10">10</option><option value="15">15</option><option value="all">all</option>';
								}
								echo "</select>";
							}
						}
					?>	
				</form>
			</div>
			<div id="productZoekenVak">
				<form action="../Views/allproducts" method="POST">
					<input type="text" id ="search" name="keyWord">
					<input type="hidden" name="productZoeken" value="true">
					<input type="submit" name="submit" id="" value="Zoeken">
				</form>
			</div>
			<div id="allproducts-filteren">Filteren
			<div id='allproducts-dropdown-filter'>
				<form action="../Controllers/RequestController.php" method="POST">
					<b>Filteren op:</b><br>
					<?php 
						require_once ("../Controllers/LogicController.php");
						LogicController::outputFilterDropdown();
					?>
					<input type="hidden" name="Filteren" value="true">
					<input type='submit' id='filteren-submit'>
				</form>
			</div>
		</div>
		<div id="allproducts-sort">Sorteren
			<div id='allproducts-dropdown-sort'>
				<div class="allproducts-dropdown-lineitem-sort" id="categorie-asc">Categorie oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="categorie-desc">Categorie aflopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="datum-asc">Datum oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="datum-desc">Datum aflopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="naam-asc">Naam oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="naam-desc">Naam aflopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="prijs-asc">Prijs oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="prijs-desc">Prijs aflopend</div>	
				<div class="allproducts-dropdown-lineitem-sort" id="rating-asc">Beoordeling oplopend</div>
				<div class="allproducts-dropdown-lineitem-sort" id="rating-desc">Beoordeling aflopend</div>			
			</div>
		</div>
	</div>
	<div id="producten-alle" class="row">
		<?php 

	        $alleprod = LogicController::getAlleProducten();
 
            // var_dump($p . " " . $g);

			if (isset($_POST['productZoeken'])) {
			    
			    if(!isset($_SESSION['selectedCats'])){
			        $alleprod = LogicController::getAlleProducten();
			    }
			    else{
			        $alleprod = $_SESSION['selectedCats'];
			    }


				if (isset($_GET['p'])) {
		        	$_GET['p'] -= 1;
		        }
		 

				if (!(isset($_GET['p']))){
	                $p = -1;
	            }
	            else{
	                $p = $_GET['p'];
	            }

	            if (!(isset($_GET['g']))){
	                $g = 10;
	            }
	            else{
	            	if ($_GET['g'] == "all") {
	            		$g = sizeof($alleprod);
	            	}
	            	else{
	                	$g = $_GET['g'];
	            	}
	            }

			    $returnArr = [];
			   
			    foreach ($alleprod as $prod) {
			       if (strpos(strtoupper($prod->naam), strtoupper($_POST['keyWord']) ) !== false) {
			            array_push($returnArr, $prod);
			       }
			    }

			    $producten = $returnArr;

			    $html = "";

				$toStart = $p * $g;

    			$t = 0;
	        
			    for ($i=0; $i < sizeof($producten); $i++) {
					if ($i >= $toStart && $t < $g) {
            			$t++;
				        $html .= "<a href='/Views/detail?opgevraagdProduct=".$producten[$i]->id."'><div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 parent-thumb-cont'>"
				         . "<div class='thumbnail thumb-cont'>"
				         . "<div class='thumb-cont-money-circle'>€ ".round($producten[$i]->prijs, 1)."</div>"
				         . "<img src='".$producten[$i]->img_path."'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
				         . "<div class='caption'>"
				         . "<h3>".$producten[$i]->naam."</h3>"
				         . "<div class='wrapper-date-cat'><b>".date("d-m-Y",strtotime($producten[$i]->datum_toegevoegd))."</b>"
				         . "<b class='thumb-categorie'>".$producten[$i]->cat_naam."</b></div>"
				         . "</div>"   
				         . "</div>"
				         . "<form action='../Controllers/RequestController.php' method='POST'>"
				         . "<input type='hidden' name='toAddProduct' value='".$producten[$i]->id."'>"
				         . "<input type='submit' value='' class='winkelwagen-btn winkelwagen-add' title='Voeg toe aan winkelmandje'>";
				          if ($producten[$i]->avg_rating != 0) {
				            $html .= "<div class='product-rating-icon'>".round($producten[$i]->avg_rating, 1)."</div>";
				          }
				         $html.= "</form>"
				         . "<div class='product-metadata-id metadata'>".$producten[$i]->id."</div>"
				         . "<div class='product-metadata-naam metadata'>".$producten[$i]->naam."</div>"
				         . "<div class='product-metadata-prijs metadata'>".$producten[$i]->prijs."</div>"
				         . "</div></a>";
				     }
			     }
			     echo $html;
			}
			else{
				include("partials/alleproducts-producten-all.php"); 
			}
		?>


	</div>
	<div id='allpages-page-numbers'>
		<?php
			if (!(isset($_POST['productZoeken']))) {
				if (!(isset($_SESSION['selectedCats']))) {
					$aantallinks = sizeof($producten) / $g;
					for ($i=0; $i < $aantallinks; $i++) { 
						echo "<a href='allproducts?g=".$g."&p=".($i+1)."'>".($i+1)."</a> ";
					}
				}
			}
		?>
	</div>
		<?php include("partials/footer.php"); ?>
	</body>
</html>
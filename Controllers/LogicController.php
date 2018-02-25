<?php
// GLOBAL REQUIREMENTS      

include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";

if(!(isset($_SESSION)) ){
    session_start();
}

class LogicController
{
	#GEEFT ALLE PRODUCTEN TERUG IN EEN ARRAY
	static function getAlleProducten(){
		$alleProducten = MainDAO::getAllProducts();
		Util::compareByDatum($alleProducten,"desc");
		return $alleProducten;
	}

	#GEEFT ALLEEN DE UITGELICHTE PRODUCTEN TERUG IN EEN ARRAY
	static function getAlleUitgelichteProducten(){
		$alleProducten = MainDAO::getAllUitgelichte();
		return $alleProducten;
	}

	#GEEFT 1 SPECIFIEK PRODUCT TERUG, WORDT AANGEROEPEN MET PARAMETER ID
	static function getProduct($id){
		$product = MainDAO::getProduct($id);
		return $product;	
	}

	#DIT IS DE CODE DIE IN DE REQUESTCONTROLLER WORDT AANGESPROKEN VOOR EEN GEBRUIKER TE REGISTREREN/ DUS TOE TE VOEGEN AAN DB EN IN SESSION STEKEN
	static function registerUser()
	{
		if ($_POST['username'] == null || $_POST['password'] == null || $_POST['naam'] == null || $_POST['voornaam'] == null || $_POST['email'] == null) {
			$_SESSION['mess'][sizeof($_SESSION['mess'])] = "registerEmpty";
			Util::redirect(prevURL);
		}
		else{
			$_POST['password'] =password_hash($_POST['password'], PASSWORD_DEFAULT);
	        $toAddUser = new UserEntity($_POST['username'], $_POST['password'], $_POST['naam'], $_POST['voornaam'], 0, $_POST['email'], 0 ,1);
	        MainDAO::addUser($toAddUser);
	        $_SESSION['user'] = $toAddUser;

			Util::redirect("/");
	        die();
	    }
	}

	#DIT IS DE CODE DIE OOK IN DE REQUESTCONTROLLER WORDT AANGEROEPEN/ STEEKT USER IN SESSION ALS ALLES OKE IS
	#ANDERS RETURN HET DE ERROR EN STUURT HIJ JE TERUG, WORDT OOK STEEDS GEKEKEN NAAR DE VORIGE URL
	static function userLogIn()
	{
		echo "true";
        $gebruiker = MainDAO::getUser($_POST['username']);
        if ($gebruiker != null)
        {
            if (password_verify($_POST['password'], $gebruiker->password))
            {
            	if ($gebruiker->active == 0) {
					$_SESSION['mess'][sizeof($_SESSION['mess'])] = "userNonActive";
					Util::redirect("/Views/login");	
            	}
            	else{
	                echo "password correct";
	                $_SESSION['user'] = $gebruiker;
	                if (isset($_POST['stayloggedin'])) {
						setcookie("WebShopCookie", serialize($_SESSION['user']) , time() + (10 * 365 * 24 * 60 * 60), "/");
	                }
	                if (isset($_SESSION['alternative_befURL'])){  
						Util::redirect($_SESSION['alternative_befURL']);
	                	die();
	                }
	                else{    
						Util::redirect($_POST['befPrevUrl']);
						die();                
	                }
	                unset($_SESSION['alternative_befURL']);
            	}
            }
            else
            {
				echo "password false";
				$_SESSION['alternative_befURL'] = $_POST['befPrevUrl'];
				$_SESSION['mess'][sizeof($_SESSION['mess'])] = "wpw";
				Util::redirect("/Views/login");
				die();
            }
        } 
        else
        {
            echo "user not found";
            $_SESSION['alternative_befURL'] = $_POST['befPrevUrl'];
       		$_SESSION['mess'][sizeof($_SESSION['mess']) - 1] = "unf";
			Util::redirect("/Views/login");    
        	die();
        }
	}

	#DIT IS CODE DIE OOK IN DE REQUESTCONTROLLER WORDT AANGESPROKEN VOOR HET SORTEREN VAN DE PRODUCTEN/ 
	#JE KRIJGT IN DE POST MEE WELK EN IN WELKE DIRECTIE
	#ER GESORTEERD MOET WORDEN EN AAN DE HAND DAARVAN GAAT ER IN DEZE FUNCTIE GESORTEERD WORDEN
	static function sortAllProducts()
	{
		$methode = $_POST['sortMethode'];
    	$teSorteren = explode("-", $methode)[0];
    	$directie =  explode("-",$methode)[1];
    	if (isset($_SESSION['selectedCats'])) 
    	{
    	    $alleProducten = $_SESSION['selectedCats'];
    	}
    	else
    	{
    	    $alleProducten = MainDAO::getAllProducts();
    	}
	
    	if($teSorteren == "naam")
    	{
    	    Util::compareByName($alleProducten,$directie);
	
    	}
    	elseif($teSorteren == "datum")
    	{
    	    Util::compareByDatum($alleProducten,$directie);
    	}
    	 elseif($teSorteren == "categorie")
    	{
    	    Util::compareByCat($alleProducten,$directie);
    	}
    	 elseif($teSorteren == "prijs")
    	{
    	    Util::compareByPrijs($alleProducten,$directie);
    	}
    	 elseif($teSorteren == "rating")
    	{
    	    Util::compareByRating($alleProducten,$directie);
    	}
    	return $alleProducten;
	}

	#DEZE FUNCTIE WORDT GEBRUIKT BIJ HET FILTEREN, HIER WORDT BEPAALD WELKE CATEGORIEN ER GESELECTEERD
	#ZIJN ADHV WAARDES DIE MEEGEGEVN ZIJN IN DE GEGENEREERDE POST
	static function getSelectedCats()
	{
		$cats = MainDAO::getAllCategorien();
	    $gevraagdeFilters = [];
	    foreach ($cats as $cat) 
	    {
	       if(in_array($cat->naam, $_POST))
	       {
	            array_push($gevraagdeFilters, $cat->naam);
	       }
	    }	
	    return $gevraagdeFilters;
	}

	#DEZE FUNCTIE WORDT GEBRUIKT VOOR 1 ARRAY TE MAKEN VAN DE VERSCHILLENDE PRODUCTEN VAN VERSCHILLENDE CATEGORIEN
	#ZE WORDEN DAN 'GEMERGED'
	static function makeFilteredArray($catArray)
	{
		$result = [];
	    $data = null;

	    foreach ($catArray as $cat) 
	    {
	        $data = MainDAO::getAllByCat($cat);
	        $result = array_merge($result, $data);
	        $data = null;
	    }
	    return $result;
	}

	#DIT IS VOOR EEN PRODUCT AAN HET WINKELMANDJE TOE TE VOEGEN
	static function addNewProduct()
	{
		$product = MainDAO::getProduct($_POST['toAddProduct']);

		if($product->active == 0){
			$_SESSION['mess'][sizeof($_SESSION['mess'])] = "addVerwijderdProd";
			// header(); 
			Util::redirect(prevURL);
		}
		else
		{
			if (isset($_SESSION['winkelmandje']) == false) 
			{
				$_SESSION['winkelmandje']  = [];
			} 

			
			if (isset($_SESSION['aantallen'][$product->id])) {
				$_SESSION['aantallen'][$product->id] += 1;
			}
			else{
				$_SESSION['aantallen'][$product->id] = 1;
				array_push($_SESSION['winkelmandje'],  $product);
			}
			Util::redirect(prevURL);
		}	
	}

	#DIT IS VOOR EEN REVIEW OP EEN BEPAALD PRODUCT VIA DE DETAILPAGE TOE TE VOEGEN, WORDT OP FOUTEN GECHECKED
	static function addReview()
	{
		$allowedToAdd = false;

		if ($_POST['rating'] < 0 || $_POST['rating'] > 10) {
        	$_SESSION['mess'][sizeof($_SESSION['mess'])] = "fara";
			Util::redirect(prevURL);
			
		}
		elseif ($_POST['rating'] == null || $_POST['comment'] == null) {
			$_SESSION['mess'][sizeof($_SESSION['mess'])] = "leegreview";
			Util::redirect(prevURL);
		}
		elseif (isset($_SESSION['user']) != true) {
			$_SESSION['mess'][sizeof($_SESSION['mess'])] = "nli";
			Util::redirect(prevURL);
		}
		else{
			$allowedToAdd = true;
		}

		if ($allowedToAdd == true) {
			$review = new ReviewEntity( -1, $_SESSION['user']->username, $_POST['product_ID'], $_POST['comment'],  $_POST['rating'] );
			MainDAO::addReview($review);
        	$_SESSION['mess'][sizeof($_SESSION['mess'])] = "srev";
			Util::redirect(prevURL);
		 }
	    die();
	}

	#DIT IS VOOR IN DE NAVBAR ALLE CATEGORIËN WEER TE GEVEN
	static function outputFilterDropdown()
	{
		$cats = MainDAO::getAllCategorien();
						
		foreach ($cats as $cat) 
		{
			echo "<div class='allproducts-dropdown-lineitem-filter' value='".$cat->naam."'><input class='input-js-filter' type='checkbox' name='".$cat->naam."' value='".$cat->naam."'> ".$cat->naam."</div>";					
		}
	}

	#DIT IS VOOR ALLE REVIEWS BIJ EEN BEPAALD PRODUCT WEER TE GEVEN, WORDT BEPAALD ADHV DE ID 
	static function outputUserReviews($id)
	{
		$alleReviews = MainDAO::getAllReviewForProduct($id);
		if($alleReviews!=null){
			echo "<div id='ratingwrap'>";
			echo "<h1>Reviews:</h1>";
			foreach ($alleReviews as $review) 
			{
				$user = MainDAO::getUser($review->username);
				if ($user->img_path == "0" || $user->img_path == "" ) {
					$user->img_path = "/Resources/dummypng.png";
				}
				echo "<div class='review-line-item clearfix'><div class='detail-comment-img-usr'><img class='comments-detail-img' src='".$user->img_path."'></div><div class='wrapper-comment-text'><a href='/Views/user?u=".$review->username."'><div class='review-user link-review-profile'>".$review->username."</div></a><div class='review-comment'>".$review->comment."</div><div class='review-rating'> ".$review->rating."/10</div></div></div>";
			}
			echo "</div>";
		}
		else{

			echo "<div id='margin-div'></div>";
		}
	}

	#DIT IS VOOR DE VORIGE URL TE BEPALEN BIJ HET INLOGGEN
	static function outPutHiddenInputUrlLogin()
	{
		if (isset($_SESSION['alternative_befURL'])) 
		{
			echo "<input type='hidden' name='befPrevUrl' value='".$_SESSION['alternative_befURL']."'>"; 
		}
		else
		{
			echo "<input type='hidden' name='befPrevUrl' value='".$_SERVER['HTTP_REFERER']."'>"; 
		}	
	}

	#DIT IS VOOR TE BEPALEN OF EEN USER IS INGELOGD, ZONIET STUUR HEM TERUG NAAR DE HOME
	static function loginRedirectCheck()
	{
		if(isset($_SESSION['user']))
		{
        	Util::redirect("/");
        	die();
    	}
    }

    #VOOR DE COMPARABLE PRODUCTEN TE KRIJGEN: ALLE PRODUCTEN DIE IN DEZELFDE CATEGORIE ZITTEN ..  
    static function getComparableProducts($cat)
    {
    	return MainDAO::getAllByCat($cat); 
    }


    #DIT IS VOOR ALLE CATEGORIËN TE KRIJGEN
    static function getAllCategorien(){
    	$categorien = MainDao::getAllCategorien();
    	return $categorien;
    }

    #DIT IS VOOR EEN NIEUW PRODUCT IN DE DATABASE TOE TE VOEGEN, WORDT AANGESPROKEN IN DE REQUESTCONTROLLER 
    static function addDBNewProd($product)
    {
    	MainDAO::addProduct($product); 
    	return true;	
    }

	#DIT WORDT GEBRUIKT BIJ DE ADMIN BESTELLINGEN PAGINA, DIT ZIJN ALLE BESTELLINGEN MET DE BESTELLIJNEN ERBIJ
   static function getAllBestellingenMetInh()
    {
   		$dataA = [];
    	$alB = MainDAO::getAllBestellingen();
    	
    	foreach ($alB as $B) {
			$dataA[$B->id] = MainDAO::getBestellingInhoudBestelling($B->id);
   		}
    	return $dataA;
	}

	#DIT GEEFT ALLE GEBRUIKERS TERUG
	static function getAllUsers(){
		return MainDAO::getAllUsers();
	}

	#DIT ZORGT VOOR DE OUTPUT VAN DE ERROR OF SUCCESS MESSAGES
	static function outputMess($mess, $code){

		if ($code == 0) {
			$html = '<script>notification.notify( "success", "'.$mess.'");</script>';
			//$html =  "<div  id='succloginwrap'><div id='login-succ' class='clearfix'>".$mess."</div></div>";
		}
		if ($code == 1) {
			$html = '<script>notification.notify( "error", "'.$mess.'");</script>';
			//$html =  "<div  id='errloginwrap'><div id='login-err' class='clearfix'>".$mess."</div></div>";
		}
		if ($code == 2) {
			$html = '<script>notification.notify( "global", "'.$mess.'");</script>';
			// $html =  "<div  id='notifloginwrap'><div id='login-notif' class='clearfix'>".$mess."</div></div>";
		}

		return $html;
	}
}

?>
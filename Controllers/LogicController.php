<?php
 require_once ("../Entities/ProductEntity.php");       
 require_once ("../Entities/ReviewEntity.php");        
 require_once ("../Entities/UserEntity.php");      
 require_once ("../Models/MainDAO.php");       
 require_once ("../Controllers/Util.php");

//DEFINEN NIET NODIG -> AL IN REQUEST CONTROLLER GEDAAN
define('URL',"location: http://localhost/Web-Project-2017/Views/" );
if (isset($_SERVER['HTTP_REFERER'])){define('prevURL', "location: ".$_SERVER['HTTP_REFERER']);}

class LogicController
{
	static function getAlleProducten(){
		$alleProducten = MainDAO::getAllProducts();
		Util::compareByDatum($alleProducten,"desc");
		return $alleProducten;

	}
	static function getAlleUitgelichteProducten(){
		$alleProducten = MainDAO::getAllUitgelichte();
		return $alleProducten;
	}

	static function getProduct($id){
		$product = MainDAO::getProduct($id);
		return $product;	
	}

	static function getDetailPage()
	{
		$url = URL."detail.php?opgevraagdProduct=".$_GET['opgevraagdProduct'];
    	header($url);
	}

	static function registerUser()
	{
		$_POST['password'] =password_hash($_POST['password'], PASSWORD_DEFAULT);
        $toAddUser = new UserEntity($_POST['username'], $_POST['password'], $_POST['naam'], $_POST['voornaam'], 0, $_POST['email']);

        MainDAO::addUser($toAddUser);
        $_SESSION['user'] = $toAddUser;

        $url = URL."index.php";
        header($url);
	}

	static function userLogIn()
	{
		echo "true";
        $gebruiker = MainDAO::getUser($_POST['username']);
        if ($gebruiker != null)
        {
            if (password_verify($_POST['password'], $gebruiker->password))
            {
                echo "password correct";
                $_SESSION['user'] = $gebruiker;
                if (isset($_SESSION['alternative_befURL'])){
                    var_dump($_SESSION['alternative_befURL']);
                    header("location: ".$_SESSION['alternative_befURL']);
                }
                else{
                    var_dump($_POST['befPrevUrl']);
                    header("location: ".$_POST['befPrevUrl']);
                }
                unset($_SESSION['alternative_befURL']);
            }
            else
            {
                 echo "password false";
                 $_SESSION['alternative_befURL'] = $_POST['befPrevUrl'];
                 $url = URL."login.php";
                 header($url);
            }
        } 
        else
        {
            echo "user not found";
            $_SESSION['alternative_befURL'] = $_POST['befPrevUrl'];
            $url = URL."login.php";
            header($url);
        }
	}

	static function sortAllProducts()
	{
		$methode = $_POST['sortMethode'];
    	$teSorteren = explode("-", $methode)[0];
    	$directie =  explode("-",$methode)[1];
    	if (isset($_SESSION['filterData'])) 
    	{
    	    $alleProducten = $_SESSION['filterData'];
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

	static function makeFilteredArray($catArray)
	{
		$result = [];
	    $data = null;

	    foreach ($catArray as $cat) 
	    {
	        $data = MainDAO::getAllByCat($cat);
	        $result += $data;
	        $data = null;
	    }
	    return $result;
	}

	static function addNewProduct()
	{
		$product = MainDAO::getProduct($_POST['toAddProduct']);
		if (isset($_SESSION['winkelmandje']) == false) 
		{
			$_SESSION['winkelmandje']  = [];
		} 
		array_push($_SESSION['winkelmandje'],  $product);
		header(prevURL);
	}

	static function addReview()
	{
		$review = new ReviewEntity( -1, $_SESSION['user']->username, $_POST['product_ID'], $_POST['comment'],  $_POST['rating'] );
	    MainDAO::addReview($review);
	    header(prevURL);
	}

	static function outputFilterDropdown()
	{
		$cats = MainDAO::getAllCategorien();
						
		foreach ($cats as $cat) 
		{
			echo "<div class='allproducts-dropdown-lineitem-filter' value='".$cat->naam."'><input type='checkbox' name='".$cat->naam."' value='".$cat->naam."'> ".$cat->naam."</div>";					
		}
	}

	static function outputUserReviews($id)
	{
		$alleReviews = MainDAO::getAllReviewForProduct($id);
		if($alleReviews!=null){
			echo "<div id='ratingwrap'>";
			echo "<h1>Reviews:</h1>";
			foreach ($alleReviews as $review) 
			{
				echo "<div class='review-line-item clearfix'><div class='review-user'>".$review->username."</div><div class='review-comment'>".$review->comment."</div><div class='review-rating'> ".$review->rating."/10</div></div>";
			}
			echo "</div>";
		}
		else{

			echo "<div id='margin-div'></div>";
		}
	}

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

	static function loginRedirectCheck()
	{
		if(isset($_SESSION['user']))
		{
        	header(URL);
    	}
    }

}
?>
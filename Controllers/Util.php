<?php
class Util{
	static function compareByName(&$unsortedA,$order)
	{
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				$at = strtolower($a->naam);
				$bt = strtolower($b->naam);
				return strcmp($at, $bt);
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				$at = strtolower($a->naam);
				$bt = strtolower($b->naam);
				return strcmp($bt, $at);
			});
		}
	}

	static function compareByPrijs(&$unsortedA,$order)
	{
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return $a->prijs > $b->prijs;
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return $b->prijs > $a->prijs;
			});
		}
	}

	static function compareByDatum(&$unsortedA,$order)
	{	
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($a->datum_toegevoegd) - strtotime($b->datum_toegevoegd);
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($b->datum_toegevoegd) - strtotime($a->datum_toegevoegd);
			});
		}
	}

	static function compareByCat(&$unsortedA,$order)
	{
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($a->datum_toegevoegd) - strtotime($b->datum_toegevoegd);
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return strtotime($b->datum_toegevoegd) - strtotime($a->datum_toegevoegd);
			});
		}
	}

	static function compareByRating(&$unsortedA,$order)
	{
		if ($order == "asc") {
			return usort($unsortedA, function($a,$b){
				return $a->avg_rating > $b->avg_rating;
			});
		}

		if ($order == "desc") {
			return usort($unsortedA, function($a,$b){
				return $b->avg_rating > $a->avg_rating;
			});
		}
	}

	static function productObjectToArray($Object)
	{
		$array = [];

		for ($i=0; $i < sizeof($Object) ; $i++) 
		{ 
			$array[$i] = [];
			$array[$i]['id'] = $Object[$i]->id;
			$array[$i]['cat_naam'] = $Object[$i]->cat_naam;
			$array[$i]['naam'] = $Object[$i]->naam;
			$array[$i]['prijs'] = $Object[$i]->prijs;
			$array[$i]['beschrijving'] = $Object[$i]->beschrijving;
			$array[$i]['datum_toegevoegd'] = $Object[$i]->datum_toegevoegd;
			$array[$i]['img_path'] = $Object[$i]->img_path;
			$array[$i]['avg_rating'] = $Object[$i]->avg_rating;
		}
		
		return $array;
	}

	static function productArrayDateConversion($Array)
	{
		for ($i=0; $i < sizeof($Array) ; $i++) 
		{ 
			$Array[$i]['datum_toegevoegd'] = explode("-", $Array[$i]['datum_toegevoegd'])[2]."-".explode("-", $Array[$i]['datum_toegevoegd'])[1]."-".explode("-", $Array[$i]['datum_toegevoegd'])[0];
		}
		
		return $Array;
	}

	// functie gebruikt van: http://stackoverflow.com/a/19366999
	static function utf8ize($d) 
	{
	    if (is_array($d)) 
    	{
        	foreach ($d as $k => $v) 
        	{
            	$d[$k] = Util::utf8ize($v);
        	}
	    } else if (is_string ($d)) 
	    {
	        return utf8_encode($d);
	    }
	    return $d;
	}

	public static function unsetValue(array $array, $value){
        if(($key = array_search($value, $array)) !== FALSE) {
            unset($array[$key]);
        }
        return $array;
    }

    static function redirect($url, $statusCode = 303)
	{
   		header('Location: ' . $url, true, $statusCode);
   		die();
	}

	//Functie gebruikt van: http://stackoverflow.com/a/6472227
	function compare_objects($obj_a, $obj_b) {
		return $obj_a->id - $obj_b->id;
	}

	#DIT IS DE PHPMAILER PACKAGE
	static function sendMail($subject, $message, $reciever){
		require_once "../vendor/autoload.php";
	    $mail = new PHPMailer;
	    //Enable SMTP debugging. 
	    // $mail->SMTPDebug = 3;                               
	    //Set PHPMailer to use SMTP.
	    $mail->isSMTP();            
	    //Set SMTP host name                          
	    $mail->Host = "smtp.gmail.com";
	    //Set this to true if SMTP host requires authentication to send email
	    $mail->SMTPAuth = true;                          
	    //Provide username and password     
	    $mail->Username = "webshoptristanwebproject@gmail.com";                 
	    $mail->Password = "Webshop1234";                           
	    //If SMTP requires TLS encryption then set it
	    $mail->SMTPSecure = "tls";                           
	    //Set TCP port to connect to 
	    $mail->Port = 587;                                   

	    $mail->From = "webshoptristanwebproject@gmail.com";
	    $mail->FromName = "WebShop Tristan Bomans";

	    $mail->addAddress($reciever, "Webshop Klant");

	    $mail->isHTML(true);

	    $mail->Subject = $subject;
	    $mail->Body = $message;
	    $mail->AltBody = "This is the plain text version of the email content";
	   
	    if(!$mail->send()) 
	    {
	        echo "Mailer Error: " . $mail->ErrorInfo;
	    } 
	    else 
	    {
	        echo "Message has been sent successfully";
	    }
	}

	#ALLE IN ARRAY MOGEN DOOR
	static function authorisation($toegelatenA) {
		#ALLEEN INGELOGDE GEBRUIKERS MOGEN DOOR
		if (in_array(-1, $toegelatenA) != true) {
			if (isset($_SESSION['user']) != true) {
				$_SESSION['mess'][sizeof($_SESSION['mess'])] = "nli";
				Util::redirect('/');
			}
		}

		if (in_array(-1, $toegelatenA) == true) {
			if (in_array(0, $toegelatenA) != true) {
				if (isset($_SESSION['user'])) {
					$_SESSION['mess'][sizeof($_SESSION['mess'])] = "cbli";
					Util::redirect('/');
				}
			}
		}

		#0 (GEWONE GEBRUIKER) ZIT NIET IN ARRAY, ENKEL ADMINS MOGEN DOOR
		if (in_array(0, $toegelatenA) != true) {
			if (isset($_SESSION['user'])) {
				if ($_SESSION['user']->authority != 1) {
					$_SESSION['mess'][sizeof($_SESSION['mess'])] = "wu";
					Util::redirect('/');
				}
			}
		}

		

	}


}

?>
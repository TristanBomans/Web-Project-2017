<?php
#BENODIGDE ACTIES OM DE FACEBOOK API AAN TE SPREKEN, JE GAAT ERNA CHECKEN OF DE USER REEDS BESTAAT 
#OF DAT JE HEB IN DE DB INSERT

include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; 
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/facebook/graph-sdk/src/Facebook/autoload.php';

if(isset($_GET['fb'])){
	$fb = new Facebook\Facebook([
	  'app_id' => '1881976598685166',
	  'app_secret' => 'a1eab8cef0ad34fc5844933b04e7cb29',
	  'default_graph_version' => 'v2.8',
	]);

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; // optional
	$loginUrl = $helper->getLoginUrl($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'], $permissions);

	if (!(isset($_GET['code']))) {
		header("location: " . $loginUrl);
	}

	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (isset($accessToken)) {
	  $_SESSION['facebook_access_token'] = (string) $accessToken;
	  // Now you can redirect to another page and use the
	  // access token from $_SESSION['facebook_access_token']
	}
	if (isset($_SESSION['facebook_access_token'])) {
		try {
		  $response = $fb->get('/me?locale=en_US&fields=name,email',$_SESSION['facebook_access_token']);
		  $userNode = $response->getGraphUser();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$voornaam = explode(" ",  $userNode->getName())[0];
		$naam = substr($userNode->getName(), strpos($userNode->getName(), " "));
		
		// $naam = explode(" ",  $userNode->getName())[1];
		$emailadres = $userNode->getField('email');
		$id = $userNode->getField('id');

		$fb_avatar = file_get_contents("http://graph.facebook.com/" . $id . "/picture?width=9999");
		$save = file_put_contents("../Resources/profilepics/fb-" . $id . ".jpg", $fb_avatar);

		$toAddUser = new UserEntity( $voornaam." ".$naam, "" , $naam, $voornaam, 0, $emailadres, "../Resources/profilepics/fb-" . $id . ".jpg", 1);

		if(!(MainDAO::getUser($voornaam." ".$naam))){
			MainDAO::addUser($toAddUser);
		}else{
			$toAddUser = MainDAO::getUser($voornaam." ".$naam);
		}

		unset($_SESSION['facebook_access_token']);

		$toAddUser->ip = $_SERVER['REMOTE_ADDR'];
        MainDAO::updateUser($toAddUser);
		$_SESSION['user'] = $toAddUser;

		header("location: ".URL);
	}
}

?>

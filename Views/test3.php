<?php
include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; 

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/facebook/graph-sdk/src/Facebook/autoload.php';
// session_start();


$fb = new Facebook\Facebook([
  'app_id' => '1881976598685166',
  'app_secret' => 'a1eab8cef0ad34fc5844933b04e7cb29',
  'default_graph_version' => 'v2.8',
]);

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; // optional
	$loginUrl = $helper->getLoginUrl($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'], $permissions);

	// echo '<a href="' . $loginUrl . '">Registreer met Facebook!</a>';

	if (!(isset($_GET['code']))) {
		header("location: ".$loginUrl);
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
  // echo "Logged in!";
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  // var_dump($_SESSION);
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}
if (isset($_SESSION['facebook_access_token'])) {
	# code...
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
	$naam = explode(" ",  $userNode->getName())[1];
	$emailadres = $userNode->getField('email');
	$toAddUser = new UserEntity( $voornaam." ".$naam, "" , $naam, $voornaam, 0, $emailadres);
	// var_dump($voornaam.$naam.$emailadres);
	if(!(MainDAO::getUser($voornaam." ".$naam))){
		MainDAO::addUser($toAddUser);
	}
	unset($_SESSION['facebook_access_token']);



	$_SESSION['user'] = $toAddUser;
	header("location: ".URL);
	// unset($userNode);
	// unset($helper);
}


?>

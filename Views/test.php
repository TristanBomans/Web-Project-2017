<?php 
include $_SERVER['DOCUMENT_ROOT']."/namespaces.php"; 

// var_dump($_SERVER['REMOTE_ADDR']);

// setcookie("WebShopCookie", serialize($_SESSION['user']) , time() + (10 * 365 * 24 * 60 * 60));

// var_dump(unserialize($_COOKIE['WebShopCookie']) == $_SESSION['user']);


// $cookie_name = "user";
// $cookie_value = "John Doe";
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


var_dump($_SESSION);


?>
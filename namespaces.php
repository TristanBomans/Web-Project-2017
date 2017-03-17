<?php
	/*http://stackoverflow.com/a/599694*/
	foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Web-Project-2017/Controllers/*.php") as $filename){
	    include_once $filename;
	}
	foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Web-Project-2017/Entities/*.php") as $filename){
	    include_once $filename;
	}
	foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Web-Project-2017/Models/*.php") as $filename){
	    include_once $filename;
	}
	if (!defined('URL')){
			define('URL',"http://localhost/Web-Project-2017/" );
	}

		if (!defined('prevURL')){
			if (isset($_SERVER['HTTP_REFERER'])){define('prevURL', "location: ".$_SERVER['HTTP_REFERER']);}
	}

	// define('URLl',"http://localhost/Web-Project-2017/" );
?>
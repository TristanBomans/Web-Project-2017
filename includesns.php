
<?php
	foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Web-Project-2017/Controllers/*.php") as $filename){
	    include_once $filename;
	}
	foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Web-Project-2017/Entities/*.php") as $filename){
	    include_once $filename;
	}
	foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Web-Project-2017/Models/*.php") as $filename){
	    include_once $filename;
	}

?>
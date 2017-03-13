<div id='footer' class='container'>
	<p>All Rights Reserved By Tristan Bomans &copy; </p>
</div>

<?php 
if (isset($_SERVER['HTTP_REFERER'])) {
	if (!($_SERVER['HTTP_REFERER'] == "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']))
	{
		unset($_SESSION['filterData']); 
	}
}
?>
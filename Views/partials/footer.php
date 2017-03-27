<div id='footer' class='container'>
	
	<div id="icons-footer">
		<div class="footericons" id="global-secure"></div>
		<div class="footericons" id="commerce"></div>
		<div class="footericons" id="safeonweb"></div>
	</div>
	<div id="footertext-cont">
		<div id="footertext" class="">All Rights Reserved By Tristan Bomans &copy; </div>
	</div>
</div>

<?php 
if (isset($_SERVER['HTTP_REFERER'])) {
	if (!($_SERVER['HTTP_REFERER'] == "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']))
	{
		unset($_SESSION['filterData']); 
	}
}
?>
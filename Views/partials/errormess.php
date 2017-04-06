<?php 
	if (isset($_GET['err'])) {
		if ($_GET['err'] == 'nli') {
			echo "<div id='errloginwrap'><div id='login-err' class='clearfix'>U dient in te loggen voor deze actie kan uitvoeren.</div></div>";
		}
	}
?>
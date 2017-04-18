<?php 
	if (isset($_SESSION['mess'])) {
		foreach ($_SESSION['mess'] as $e) {
			if ($e == 'nli') {
				echo LogicController::outputMess("U dient in te loggen voor deze actie kan uitvoeren.", 1);
			}
			if ($e == 'wu') {
				echo LogicController::outputMess("U bent niet geauthenticeerd om dit te bekijken.", 1);
			}
			if ($e == 'bsuc') {
				echo LogicController::outputMess("Uw bestelling is geplaatst", 0);
			}
			if ($e == 'wpw') {
				echo LogicController::outputMess("Fout Wachtwoord!", 1);
			}
			if ($e == 'unf') {
				echo LogicController::outputMess("Gebruiker niet gevonden!", 1);
			}
			if ($e == 'fara') {
				echo LogicController::outputMess("Oops, foutieve invoer bij het 'Rating' veldje.", 1);
			}
		}
		unset($_SESSION['mess']);
	}
?>
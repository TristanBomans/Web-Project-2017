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
		}
		unset($_SESSION['mess']);
	}
?>
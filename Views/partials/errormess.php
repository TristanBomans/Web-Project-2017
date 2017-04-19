<?php 
	if (isset($_SESSION['mess'])) {
		foreach ($_SESSION['mess'] as $e) {
			if ($e == 'nli') {
				echo LogicController::outputMess("U dient in te loggen voor deze actie kan uitvoeren.", 1);
			}
			if ($e == 'wu') {
				echo LogicController::outputMess("U bent niet gemachtigd om dit te bekijken.", 1);
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
			if ($e == 'wem') {
				echo LogicController::outputMess("Oops, er werd naar een foutieve bestelling verwezen.", 1);
			}
			if ($e == 'cbli') {
				echo LogicController::outputMess("Voor deze actie mag u niet ingelogd zijn.", 1);
			}
			if ($e == 'srev') {
				echo LogicController::outputMess("Uw review werd succesvol geplaatst.", 0);
			}
			if ($e == 'wpbm') {
				echo LogicController::outputMess("U selecteerde geen betaalmethode.", 1);
			}
			if ($e == 'wfgeg') {
				echo LogicController::outputMess("U vulde uw factuurgegevens onvolledig in.", 1);
			}
			if ($e == 'wlgeg') {
				echo LogicController::outputMess("U vulde uw levergegevens onvolledig in.", 1);
			}
			if ($e == 'geenavw') {
				echo LogicController::outputMess("U accepteerde de algemene voorwaarden niet.", 1);
			}
			if ($e == 'leegreview') {
				echo LogicController::outputMess("Een van de veldjes van de review was niet ingevuld.", 1);
			}
			if ($e == 'contactEmpty') {
				echo LogicController::outputMess("Een van de veldjes van het contact-formulier werd leegelaten.", 1);
			}
			if ($e == 'registerEmpty') {
				echo LogicController::outputMess("Een van de veldjes van het Registreer-formulier werd leegelaten.", 1);
			}
			if ($e == 'EditProdEmpty') {
				echo LogicController::outputMess("Een van de veldjes van het Product-bewerk-formulier werd leegelaten.", 1);
			}
			if ($e == 'NewProdEmpty') {
				echo LogicController::outputMess("Een van de veldjes van het Nieuw-Product-formulier werd leegelaten.", 1);
			}
			if ($e == 'editUserAdmEmpty') {
				echo LogicController::outputMess("Het te bewerken veldje werd leeggelaten.", 1);
			}
			if ($e == 'succesupdate') {
				echo LogicController::outputMess("Succesvol Bijgewerkt.", 0);
			}
			if ($e == 'wsconfigempty') {
				echo LogicController::outputMess("Een van de veldjes werd leegelaten bij het bijwerken van de Configuratie.", 1);
			}
			if ($e == 'aanpassen-fw-aantal-empty') {
				echo LogicController::outputMess("Het aantal mag niet niets zijn! <i>Waarde 0 om te verwijderen</i>", 1);
			}
			if ($e == 'editCatEmpty') {
				echo LogicController::outputMess("Je kan de categorie niet naar leeg veranderen", 1);
			}

			if ($e == 'newCatEmpty') {
				echo LogicController::outputMess("Je kan geen lege categorieën toevoegen", 1);
			}

		}
		unset($_SESSION['mess']);
	}
?>
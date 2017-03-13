<div id='detailwrap-log-reg'>
	<form id="login-form" method="POST" action="../Controllers/RequestController.php" class="clearfix">
		<h2 id="h2-login">Registreren: </h2>
		<div class="login-line-content">
			<p class="login-p">Gebruiker: </p>
			<input required type="text" name="username"  class='login-input'>
		</div>
		<div class="login-line-content">
			<p class="login-p">Wachtwoord: </p>
			<input required type="password" name="password"  class='login-input'>
		</div>
		<div class="login-line-content">
			<p class="login-p">E-mail: </p>
			<input required type="text" name="email"  class='login-input'>
		</div>
		<div class="login-line-content">
			<p class="login-p">Naam: </p>
			<input required type="text" name="naam"  class='login-input'>
		</div>
		<div class="login-line-content">
			<p class="login-p">Voornaam: </p>
			<input required type="text" name="voornaam"  class='login-input'>
		</div>
		<div class="login-line-content-submit-button">
			<input type="submit" name="submit">
		</div>
		<input type="hidden" name="typeRequest" value="registeruser">
	</form>
</div>
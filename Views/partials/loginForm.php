<div id='detailwrap-log-reg'>
	<form id="login-form" class="clearfix" method="POST" action="../Controllers/RequestController.php">
		<h2 id="h2-login">Log in </h2>
		<div class="login-line-content">
			<p class="login-p">Gebruikersnaam: </p>
			<input required type="text" name="username" class='login-input'>
		</div>
		<div class="login-line-content">
			<p class="login-p">Wachtwoord: </p>
			<input required  type="password" name="password" class='login-input'>
		</div>
		<div class="login-line-content-submit-button clearfix">
			<input type="submit" name="submit">
		</div>
		<input type="hidden" name="typeRequest" value="loginuser">
		<?php 
			LogicController::outPutHiddenInputUrlLogin();
		?>
	</form>
</div>
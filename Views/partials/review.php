<?php 
	require_once("../Controllers/LogicController.php");
?>
<div id='detailwrap-detail'>
	<form action="../Controllers/RequestController.php" method="POST" class="clearfix">
		<h2 id="h2-login">Schrijf een Review: </h2>
		<div class="login-line-content clearfix">
			<p class="login-p">Rating: </p>
			<input type="number" min="0" max="10" name="rating" class="login-input" required>
		</div>
		<div class="login-line-content clearfix">
			<p class="login-p">Opmerking: </p>
			<textarea type="text"  name="comment" class="login-input" required></textarea>
		</div>
		<div class="login-line-content-submit-button clearfix">			
				<?php if(isset($_SESSION['user'])){
					echo "<input type='submit'>";
				}
				else{
					echo "<input disabled type='submit' value='Eerst inloggen' id='disabled-rating'>";
				}
				?>		
		</div>
		
		<?php echo "<input type='hidden' name='product_ID' value='".$OGproduct->id."'>"?>
		<input type="hidden" name="toAddReview" value="true" >
	</form>
</div>

<?php 
	LogicController::outputUserReviews($OGproduct->id);
?>

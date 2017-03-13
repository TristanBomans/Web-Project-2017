<div id='detailwrap-detail'>
	<form action="../Controllers/RequestController.php" method="POST">
		<h2 id="h2-login">Schrijf een Review: </h2>
		<div class="login-line-content clearfix">
			<p class="login-p">Rating: </p>
			<input type="text" name="rating" class="login-input">
		</div>
		<div class="login-line-content clearfix">
			<p class="login-p">Opmerking: </p>
			<input type="text" name="comment" class="login-input">
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
		
		<?php echo "<input type='hidden' name='product_ID' value='".$product->id."'>"?>
		<input type="hidden" name="toAddReview" value="true" >
	</form>
</div>

	<?php 
		$alleReviews = MainDAO::getAllReviewForProduct($product->id);
		if($alleReviews!=null){
			echo "<div id='ratingwrap'>";
			echo "<h1>Reviews:</h1>";
			foreach ($alleReviews as $review) 
			{
				echo "<div class='review-line-item clearfix'><div class='review-user'>".$review->username."</div><div class='review-comment'>".$review->comment."</div><div class='review-rating'> ".$review->rating."/10</div></div>";
			}
			echo "</div>";
		}
		else{

			echo "<div id='margin-div'></div>";
		}
	?>

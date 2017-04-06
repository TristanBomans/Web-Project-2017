<?php include($_SERVER['DOCUMENT_ROOT']."/Views/partials/includes.php"); ?>

<script type="text/javascript">
$(document).ready(function(){
	$('#search').change(function () {
			searchAvailableAssets();
	});
})

function searchAvailableAssets()
{
	var keyWord = $('#search').val();
	// var filter = $('#filter input:checked').val();
	$.ajax({
		type: 'GET',
		url: '../Controllers/RequestController.php',
		data: { 'keyWord': keyWord, 'productZoeken' : 'true' },
		dataType: "JSON",
		success: function(data) {
			var html = "";
			console.log(data);
				for (var i = 0; i < data.length; i++) {
					html += "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 parent-thumb-cont'>"
					+ "<div class='thumbnail thumb-cont'>"
					+ "<div class='thumb-cont-money-circle'>€ " + data[i].prijs + "</div>"
					+ "<img src='" + data[i].img_path + "'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
			        + "<div class='caption'>"
			        + "<h3>" + data[i].naam + "</h3>"
			        + "<div class='wrapper-date-cat'><b>" + data[i].datum_toegevoegd + "</b>"
			        + "<b class='thumb-categorie'>" + data[i].cat_naam + "</b></div>"        
			        + "<a value='Detail' class='btn btn-default btn-lg btn-detail' href='/Views/detail?opgevraagdProduct="+ data[i].id + "'>Detail</a>"
			        + "</div>"   
			        + "</div>"
			        + "<form action='../Controllers/RequestController.php' method='POST'>"
			        + "<input type='hidden' name='toAddProduct' value='" + data[i].id + "'>"
			        + "<input type='submit' value='' class='winkelwagen-btn' title='Voeg toe aan winkelmandje'>";
			        if (data[i].avg_rating != 0) {
			        html +=  "<div class='product-rating-icon'>" + data[i].avg_rating +"</div>";
			 	  	}
			        html += "</form>"
			        + "</div>";
				}

        	$("body").append(html);

		}
	});
}
</script>


<input type="" id ="search" name="keyWord">
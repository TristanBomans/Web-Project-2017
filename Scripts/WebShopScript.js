$(document).ready(function(){
console.log("JavaScript Works!");})


$(function(){
	$("#instellingen-dropdown").on('click', function(e){
		console.log("lol");
		$("#instellingen-dropdown-content").toggle();

		e.stopPropagation();

		$("body").on('click', function(e){
			if(!($(e.target).parents("#instellingen-dropdown-content").length > 0)){
				$("#instellingen-dropdown-content").hide();
			}
		});
	});

	$(".allproductsandsort-dropdown-line-item").on('click', function(e){
		var attrClicked = $(this).attr("id");
		console.log("Clicked on: " + attrClicked);
		$.ajax({
			type: "POST",
			url: "http://localhost/Web-Project-2017/Controllers/RequestController.php",
			data: {'sortMethode' : attrClicked},
			dataType: "JSON",
			success: function(data){
				console.log(data);
				var html = "";
		        
				for (var i = 0; i < data.length; i++) {
					html += "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6 parent-thumb-cont'>"
					+ "<div class='thumbnail thumb-cont'>"
					+ "<img src='" + data[i].img_path + "'class='image-thumb' alt='Deze afbeelding kon niet gevonden worden'>"
			        + "<div class='caption'>"
			        + "<h3>" + data[i].naam + "</h3>"
			        + "<p class='p-styled-justify'>" + data[i].beschrijving + "</p>"
			        + "<b>" + data[i].datum_toegevoegd + "</b>"
			        + "<form action='../Controllers/RequestController.php' method='GET'>"
			        + "<input type='hidden' name='opgevraagdProduct' value='" + data[i].id + "'>"
			        + "<input type='submit' value='Detail' class='btn btn-default btn-lg'>"
			        + "</form>"
			        + "</div>"   
			        + "</div>"
			        + "<form action='../Controllers/RequestController.php' method='POST'>"
			        + "<input type='hidden' name='toAddProduct' value='" + data[i].id + "'>"
			        + "<input type='submit' value='' class='winkelwagen-btn' title='Voeg toe aan winkelmandje'>"
			        +"</form>"
			        + "</div>";
				}
		  
				$("#producten-alle").html(html);
				
			}
		});

	});
});
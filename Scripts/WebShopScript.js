$(document).ready(function(){
	console.log("JavaScript Works!");

})

//UNUSED CURRENTLY


$(function(){
	$("#instellingen-dropdown").on('click', function(e){
		// $("#instellingen-dropdown-content").toggle();
		$("#instellingen-dropdown-content").slideToggle(200);

		e.stopPropagation();

		$("body").on('click', function(e){
			if(!($(e.target).parents("#instellingen-dropdown-content").length > 0)){
				$("#instellingen-dropdown-content").slideUp(100)
			}
		});
	});

	$(".allproducts-dropdown-lineitem-sort").on('click', function(e){
		var attrClicked = $(this).attr("id");
		console.log("Clicked on: " + attrClicked);
		$.ajax({
			type: "POST",
			url: "../Controllers/RequestController.php",
			data: {'sortMethode' : attrClicked},
			dataType: "JSON",
			success: function(data){
				console.log(data);
				var html = "";
		        
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
		  
				$("#producten-alle").html(html);
				
			}
		});

	});

	$(".winkelwagen-add").on("click", function(e){
		e.preventDefault();

		var productId = $(this).parent().parent().find(".product-metadata-id").html();
		var productNaam = $(this).parent().parent().find(".product-metadata-naam").html();
		var productPrijs = $(this).parent().parent().find(".product-metadata-prijs").html();
		var totalPrijs = $("#winkelmandje-totalprice").html();
		totalPrijs = Number(totalPrijs.split(" ")[1]);
		totalPrijs += Number(productPrijs);

		$.ajax({
	        type: "POST",
	        url: "../Controllers/RequestController.php",
	        data: {'toAddProduct' : productId},
	        success: function() {
	        	var aantal = "";
	        	console.log(productId);
	        	console.log($("#" + productId).length != 0);
	        	// console.log();

	        	if($("#" + productId).length != 0) {
	        		// AANTAL AANPASSEN
	        		aantal = $("#" + productId).html().substring(2);
	        		aantal = aantal.substring(0,aantal.length-1);
	        		aantal = +aantal + 1; 

					$("#" + productId).html("(x"+aantal+")");

					// PRIJS PER STUK AANPASSEN
					var eenhPrijs = $("#prijs-" + productId).html().substring(2);
					eenhPrijs = +eenhPrijs + +productPrijs;
					
					 $("#prijs-" + productId).html("€ " + eenhPrijs);
					console.log(+eenhPrijs);

					// TOTAALPRIJS AANPASSEN
					var totPrijs = $("#winkelmandje-totalprice").html().substring(2);
					totPrijs = +totPrijs + +productPrijs;

					 $("#winkelmandje-totalprice").html("€ " + totPrijs);

				}
				else{
		        	var html ="<div class='individuele-item-div-dropdown clearfix'><p class='naam-product-dropdown'>"+productNaam+" <i id='"+productId+"'>(x1)</i></p> <p class='prijs-product-dropdown' id='prijs-"+productId+"'>€ "+productPrijs+ "</p></div>"; 
		        	$("#winkelmandje-items").append(html);

		        	var html ="€ " + totalPrijs;
		        	$("#winkelmandje-totalprice").html(html);
		        	
		        	var html =" <a id ='winkelmandje-dropdown-meer-detail'  href='/Views/winkelmandje-full'>Meer detail</a>"
		        	$("#meer-detail-invoeg").html(html);
	        	}
	        }
	    });
	});

	$("#filteren-submit").on("click", function(e){
		e.preventDefault();
		var checkedCats = [];

		
		$('.input-js-filter:checked').each(function(){
			var waarde = $(this).val();
			checkedCats.push(waarde);
			console.log(waarde);
		});
		console.log(checkedCats);
		$.ajax({
	        type: "POST",
	        url: "../Controllers/RequestController.php",
	        data: {'FilterenAJAX' : true, 'checkedcats' : checkedCats},
	        dataType: "JSON",
	        success: function(data) {
	        	console.log(data);
	        	var html = "";
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

        	$("#producten-alle").html(html);
	        }
	    });
	});


});
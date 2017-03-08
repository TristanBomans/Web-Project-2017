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
		// console.log("Clicked on: " + attrClicked);
		$.ajax({
			type: "POST",
			url: "http://localhost/Web-Project-2017/Controllers/RequestController.php",
			data: {'sortMethode' : attrClicked},
			success: function(data){

			}
		})

	});
});
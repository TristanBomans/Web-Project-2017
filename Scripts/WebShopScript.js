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
	
});
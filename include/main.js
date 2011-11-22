$(document).ready(function() {
	$.ajaxSetup ({
		cache: false;
	});
	
	$("#" + tab).addClass("active");

	$("#search").focus(function() {
		if ($(this).hasClass("grey")) {
			$(this).attr("value", "");
			$(this).removeClass("grey");
		}
	}).blur(function() {
		if ($(this).attr("value") === "") {
			$(this).attr("value", "Search");
			$(this).addClass("grey");
		}
	});

	$(".star").click(function() {
		$(this).toggleClass("starred");
	});
});
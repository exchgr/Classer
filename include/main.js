$(document).ready(function() {
	$.ajaxSetup ({
		cache: false
	});

	$("#" + tab).addClass("active");

	$(".grey").focus(function() {
		$(this).attr("value", "");
		$(this).removeClass("grey");
	});

	$("form#searchbar #search").blur(function() {
		if ($(this).attr("value") === "") {
			$(this).attr("value", "Search");
			$(this).addClass("grey");
		}
	});

	$("form#login #email").blur(function() {
		if ($(this).attr("value") === "") {
			$(this).attr("value", "E-Mail");
			$(this).addClass("grey");
		}
	});

	$("form#login #password").blur(function() {
		if ($(this).attr("value") === "") {
			$(this).attr("value", "Password");
			$(this).addClass("grey");
		}
	});

	$("form#login #start").click(function() {
		$("form#login").html(
			"<input type=\"text\" class=\"grey\" id=\"email\" name=\"email\" value=\"E-mail\"><br /><input type=\"password\" class=\"grey\" id=\"password\" name=\"password\" value=\"Password\"> <input type=\"submit\" value=\"\">"
		).animate({
			height: $(this).height;
			width: $(this).width;
		}, 600);
	});

	$("form#login input[type=submit]").click(function() {
		
	});

	$(".star").click(function() {
		$(this).toggleClass("starred");
	});
});
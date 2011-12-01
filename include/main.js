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

	$("form#login #username").blur(function() {
		if ($(this).attr("value") === "") {
			$(this).attr("value", "Username");
			$(this).addClass("grey");
		}
	});

	$("form#login #password").blur(function() {
		if ($(this).attr("value") === "") {
			$(this).attr("value", "Password");
			$(this).addClass("grey");
		}
	});

	$(".star").click(function() {
		$(this).toggleClass("starred");
	});

	$("form#login #start").click(function() {
		$("form#login").html(
			"<input type=\"text\" class=\"grey\" id=\"username\" value=\"E-mail\"><br /><input type=\"password\" class=\"grey\" id=\"password\" value=\"Password\"> <input type=\"submit\" value=\"\">"
		);
	});
});
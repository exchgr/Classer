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
		);
		return false;
	});

	$("form#login").submit(function() {
		$.ajax({
			type: "POST",
			url: "/api/login.php",
			data: "email=" + $("input#email").val() + "&password=" + $("input#password").val(),
			success: function(json) {
				data = parseJSON(json);
				localStorage.token = data.token;
				alert(localStorage.token);
			}
		})
		return false;
	});

	$(".star").click(function() {
		$(this).toggleClass("starred");
	});
});
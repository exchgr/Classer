$(document).ready(function() {
	$.ajaxSetup ({
		cache: false
	});

	var login = JSON.parse(localStorage.login);
	$.ajax({
		type: "POST",
		url: "/api/login/validate.php",
		data: "token=" + login.token,
		success: function(json) {
			var token = JSON.parse(json);
			alert("validation: " + token);
			if (token === login.token) {
				$("form#login").html(login.email);
			} else {
				$("form#login").html("<a href=\"#\" id=\"start\">Login</a>");
				// Problem: jQuery apparently doesn't recognize this change, and
				// completely ignores the fact that #start now exists. Also,
				// this is why the .grey manips don't work in form#login.
				$("form#login #start").click(function() {
					$("form#login").html(
						"<input type=\"text\" class=\"grey\" id=\"email\" name=\"email\" value=\"E-mail\">" + 
						"<br /><input type=\"password\" class=\"grey\" id=\"password\" name=\"password\" value=\"Password\"> " + 
						"<input type=\"submit\" value=\"\">"
					);
					$(".grey").focus(function() {
						$(this).attr("value", "");
						$(this).removeClass("grey");
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
					$("form#login").submit(function() {
						$.ajax({
							type: "POST",
							url: "/api/login/login.php",
							data: "email=" + $("input#email").val() + "&password=" + $("input#password").val(),
							success: function(json) {
								var data = JSON.parse(json);
								var login = {"email": $("input#email").val(), "token": data.token}
								localStorage.login = JSON.stringify(login);

								var logintest = JSON.parse(localStorage.login);
								alert("login: " + logintest.token + " " + data.token + " " + 
									logintest.email
								);
								window.location.reload();
							}
						})
						return false;
					});
					return false;
				});
			}
		}
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

	$(".star").click(function() {
		$(this).toggleClass("starred");
	});
});
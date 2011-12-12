<!DOCTYPE html>
<html>
	<head>
		<title>Classer</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" type="text/css" href="/style.css" />

		<!--Google Web Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Sansita+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300,300italic,400italic,600italic,700italic,800italic' rel='stylesheet' type='text/css'>

		<script type="text/javascript" language="javascript" src="/include/jquery-1.7.min.js" ></script>
		<script type="text/javascript" language="javascript">
			var c = "<? echo $_GET["c"]; ?>";
			var loggedIn;
			var login = JSON.parse(sessionStorage.login);
			if (!login) {
				login = JSON.parse(localStorage.login);
			}
			if (!login) {
				login = {"token": "", "email": ""};
				localStorage.login = JSON.stringify(login);
			}

			$(document).ready(function() {
				$.ajaxSetup ({
					cache: false
				});

				$.ajax({
					type: "POST",
					url: "/api/login/validate.php",
					data: "token=" + login.token,
					success: function(json) {
						var token = JSON.parse(json);
						if (token === login.token) {
							loggedIn = true;
							$("form#login").html(login.email + " &ndash; <a href=\"#\" id=\"logout\">Log Out</a>");
							$("form#login #logout").click(function() {
								$.ajax({
									type: "POST",
									url: "/api/login/logout.php",
									data: "token=" + login.token,
									success: function() {
										window.location.reload();
									}
								});
							});
						} else {
							loggedIn = false;
							$(".userSpecific").hide();
							login = {"token": "", "email": ""};
							localStorage.login = JSON.stringify(login);
							$("form#login").html("<a href=\"#\" id=\"start\">Log In</a>");
							$("form#login #start").click(function() {
								$("form#login").html(
									"<input type=\"text\" class=\"grey\" id=\"email\" name=\"email\" value=\"E-mail\">" + 
									"<br /><input type=\"password\" class=\"grey\" id=\"password\" name=\"password\" value=\"Password\"> " + 
									"<input type=\"submit\" value=\"\">" +
									"<br /><input type=\"checkbox\" name=\"remember\" id=\"remember\">"
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
											login = {"email": $("input#email").val(), "token": data.token};
											alert($("input#remember").is(":checked"));
											if ($("input#remember").is(":checked")) {
												localStorage.login = JSON.stringify(login);
											} else {
												sessionStorage.login = JSON.stringify(login);
											}
											window.location.reload();
										}
									});
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
			});
		</script>
	</head>

	<body>
		<header>
			<div class="wrapper">
				<form id="login" action="">
				</form><!--/.login-->
				<h1><a href="/">Classer</a></h1>
				<h2>Stop stressing, start scheduling.</h2>
			</div><!--/.wrapper-->
		</header>
		
		<nav>
			<div class="wrapper">
				<form id="searchbar">
					<input type="text" value="Search" class="grey" id="search" />
					<input type="submit" value="" />
				</form><!--/#searchbar-->
				<ul>
					<li id="courses"><a href="/courses/">Courses</a></li>
					<li id="tuition"><a href="#">Tuition</a></li>
					<li id="you" class="userSpecific"><a href="#">You</a></li>
				</ul>
			</div><!--/.wrapper-->
		</nav>	
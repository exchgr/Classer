<?
	require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?>
<script type="text/javascript" language="javascript">
	var tab = "courses";
	var course;

	$(document).ready(function() {
		$.getJSON(
			"/api/get/course.php",
			{ c: c },
			function(json) {
				var i = 0;
				course = json;
				$("#title").html(course.subjAbbr + " " + course.code + " &mdash; " + course.title);
				$("head title").append(" | " + course.subjAbbr + " " + course.code + " &mdash; " + course.title);
				if (loggedIn) {
					$.ajax({
						type: "GET",
						url: "/api/get/taken.php",
						data:
							"c=" + course.subjAbbr + " " + course.code +
							"&token=" + login.token,
						async: false,
						success: function(data) {
							var json = JSON.parse(data);
							if (json) {
								$("#title").append(" <span class=\"taken\" title=\"You've taken this course.\">&#10003;</span>");
							}
						}
					});
				}
				$("#credits").html(course.credits);
				$("#type").html(course.type);
				$("#gradingType").html(course.gradingType);
				$("#offered").html(course.offered);

				var prerequisites = "";
				for (i = 0; i < course.prerequisites.length; i++) {
					prerequisites += "<li";
					if (i === (course.prerequisites.length - 1)) {
						prerequisites += " class=\"last\"";
					}
					prerequisites += "><a href=\"/courses/course.php?c=" + course.prerequisites[i][0] + "+" + course.prerequisites[i][1] + "\">" + course.prerequisites[i][0] + " " + course.prerequisites[i][1] + "</a>";
					if (loggedIn) {
						$.ajax({
							type: "GET",
							url: "/api/get/taken.php",
							data:
								"c=" + course.prerequisites[i][0] + " " + course.prerequisites[i][1] +
								"&token=" + login.token,
							async: false,
							success: function(data) {
								var json = JSON.parse(data);
								if (json) {
									prerequisites += " <span class=\"taken\" title=\"You've taken this course.\">&#10003;</span>";
								}
							}
						});
					}
					prerequisites += "</li>";
				}
				$("#prerequisites").html(prerequisites);
				
				$("#school").html(course.school);
				$("#program").html(course.program);
				
				var satisfies = "";
				for (i = 0; i < course.satisfies.length; i++) {
					satisfies += "<li";
					if (i === (course.satisfies.length - 1)) {
						satisfies += " class=\"last\"";
					}
					satisfies += ">" + course.satisfies[i] + "</li>";
				}
				$("#satisfies").html(satisfies);
				
				$("#description div").html(course.description);

				var sections = "";
				for (i = 0; i < course.sections.length; i++) {
					sections += "<tr class=\"section\"><td>" + course.subjAbbr + " " + course.code + "-" + course.sections[i].section + "</td><td>";
					for (j = 0; j < course.sections[i].weekdays.length; j++) {
						sections += course.sections[i].weekdays[j];
						if (j != (course.sections[i].weekdays.length - 1)) {
							sections += ", ";
						}
					}
					sections += "<br />";
					sections += course.sections[i].beginTime + " - " + course.sections[i].endTime + "</td><td>" + course.sections[i].room + "</td><td><a href=\"/faculty/instructor.php?i=" + course.sections[i].instructor + "\">" + course.sections[i].instructor + "</a></td><td>" + course.sections[i].semester + " " + course.sections[i].semesterYear + "</td><td>" + course.sections[i].seatsRemaining + " <span class=\"status";
					if (course.sections[i].seatsRemaining > 0) {
						sections += " open\">open";
					} else {
						sections += " closed\">closed";
					}
					sections += "</span></td></tr>";
				}
				$("#sections table").append(sections);

				if (loggedIn) {
					$.getJSON(
						"/api/get/star.php",
						{
							c: c,
							token: login.token
						},
						function(json) {
							if (json) {
								$("#star").addClass("starred");
							}
						}
					);
				}
			}
		);

		$("#star").click(function() {
			$.getJSON(
				"/api/set/star.php",
				{
					c: c,
					token: login.token
				},
				function(json) {
					course.star = ((json.subjAbbr + " " + json.code) == c);
					if (course.star) {
						$("#star").addClass("starred");
					} else {
						$("#star").removeClass("starred");
					}
				}
			)
		});
	});
</script>

<div id="main">
	<div class="wrapper">
		<h2><div id="star" class="userSpecific"></div> <span id="title"></span></h2>
		<div class="course">
			<section id="info">
				<h2>Information</h2>
				<table>
					<tr>
						<th>Credits</th>
						<td id="credits"></td>
					</tr>
					<tr>
						<th>Course Type</th>
						<td id="type"></td>
					</tr>
					<tr>
						<th>Grading Type</th>
						<td id="gradingType"></td>
					</tr>
					<tr>
						<th>Typically Offered</th>
						<td id="offered"></td>
					</tr>
					<tr>
						<th>Prerequisites</th>
						<td><ul id="prerequisites"></ul></td>
					</tr>
					<tr>
						<th>School</th>
						<td id="school"></td>
					</tr>
					<tr>
						<th>Program</th>
						<td id="program"></td>
					</tr>
					<tr>
						<th>Satisfies</th>
						<td><ul id="satisfies"></ul></td>
					</tr>
				</table>
			</section><!--/#info-->
			<section id="description">
				<h2>Description</h2>
				<div></div>
			</section><!--/#description-->
			<section id="sections">
				<h2>Sections</h2>
				<table>
					<thead>
						<th>Section</th><th>Time</th><th>Room</th><th>Instructor</th><th>Semester</th><th>Seats Remaining</th>
					</thead>
				</table>
			</section><!--/#sections-->
		</div><!--/.course-->
	</div><!--/.wrapper-->
</div><!--/#main-->
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>
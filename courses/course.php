<?
	require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?>
<script type="text/javascript" language="javascript">
	var tab = "courses";
	var c = "<? echo $_GET["c"]; ?>";
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
				$("#credits").html(course.credits);
				$("#type").html(course.type);
				$("#gradingType").html(course.gradingType);
				$("#offered").html(course.offered);

				/*var prerequisites = "";
				for (i = 0; i < course.prerequisites.length; i++) {
					prerequisites += "<li";
					if (i === (course.prerequisites.length - 1)) {
						prerequisites += " class=\"last\"";
					}
					prerequisites += ">" + course.prerequisites[0][i] + " " + course.prerequisites[1][i] "</li>";
				}
				$("#prerequisites").html(prerequisites);*/
				
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
				
				$("#description").html(course.description);
			}
		);
	});
</script>

<div class="wrapper">
	<div id="main">
		<h2><div class="star"></div> <span id="title"></span></h2>
		<div class="course">
			<section class="info">
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
						<td id="prerequisites"></td>
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
			</section><!--/.info-->
			<section class="description">
				<h2>Description</h2>
				<div id="description"></div>
			</section><!--/.description-->
			<section class="sections">
				<h2>Sections</h2>
				<table>
					<thead>
						<th><th>Section</th><th>Time</th><th>Room</th><th>Instructor</th><th>Semester</th><th>Seats Remaining</th>
					</thead><!--/.header-->
					<tr class="section open">
						<td><div class="star"></div></td><td>IMM 270-01</td><td>Thursday<br />9AM-11:50AM</td><td>AIMM 202</td><td><a href="/faculty/instructor.php?i=Christopher+Ault">Christopher Ault</a></td><td>Spring 2012</td><td>5 <span class="status open">open</span></td>
					</tr><!--/.section-->
					<tr class="section closed">
						<td><div class="star"></div></td><td>IMM 270-02</td><td>Thursday<br />9AM-11:50AM</td><td>AIMM 202</td><td><a href="/faculty/instructor.php?i=Christopher+Ault">Christopher Ault</a></td><td>Spring 2012</td><td>0 <span class="status closed">closed</span></td>
					</tr><!--/.section-->
					<tr class="section open">
						<td><div class="star"></div></td><td>IMM 270-03</td><td>Thursday<br />9AM-11:50AM</td><td>AIMM 202</td><td><a href="/faculty/instructor.php?i=Christopher+Ault">Christopher Ault</a></td><td>Spring 2012</td><td>1 <span class="status open">open</span></td>
					</tr><!--/.section-->
					<tr class="section open">
						<td><div class="star"></div></td><td>IMM 270-04</td><td>Thursday<br />9AM-11:50AM</td><td>AIMM 202</td><td><a href="/faculty/instructor.php?i=Christopher+Ault">Christopher Ault</a></td><td>Spring 2012</td><td>6 <span class="status open">open</span></td>
					</tr><!--/.section-->
				</table>
			</section><!--/.sections-->
		</div><!--/.course-->
	</div><!--/#main-->
</div><!--/.wrapper-->
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>
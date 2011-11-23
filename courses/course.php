<?
	require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?>
<script type="text/javascript" language="javascript">
	var tab = "courses";
	var c = <? echo $_GET["c"]; ?>;
	var course;
	$(document).ready(function() {
		$.getJSON(
			"/api/get/course.php",
			{
				c: c
			}
			function(json) {
				console.log("something");
				course = json;
				$("#title").html(course.subjAbbr + " " + course.code + " &mdash; " + course.title);
				$("#credits").html(course.credits);
				$("#type").html(course.type);
				$("#gradingType").html(course.gradingType);
				$("#offered").html(course.offered);
				$("#prereqs").html(course.prereqs);
				$("#school").html(course.school);
				$("#program").html(course.program);
				$("#satisfies").html(course.satisfies);
				$("#description").html(course.description);
			}
		);
	});
</script>

<div class="wrapper">
	<div id="main">
		<h2><div class="star"></div> <span id="title"></span></h2>
		<div class="course">
			<div class="info">
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
						<td id="prereqs"></td>
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
						<td id="satisfies"></td>
					</tr>
				</table>
			</div><!--/.info-->
			<div class="description">
				<h2>Description</h2>
				<div id="description"></div>
			</div><!--/.description-->
			<div class="sections">
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
			</div><!--/.sections-->
		</div><!--/.course-->
	</div><!--/#main-->
</div><!--/.wrapper-->
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
<script type="text/javascript" language="javascript">
	var tab = "courses";
	var course;
	$(document).ready(function() {
		$.getJSON(
			"/api/get/course.php",
			function() {
				console.log("something");
				course = data;
				$("div#title").html(data.subj_abbr);
			}
		);
	});
</script>

<div class="wrapper">
	<div id="main">
		<h2><div class="star"></div> <div id="title"></div> 270 &mdash; Design Perspectives in Interactive Multimedia</h2>
		<div class="course">
			<div class="info">
				<h2>Information</h2>
				<table>
					<tr>
						<th>Credits</th>
						<td>4</td>
					</tr>
					<tr>
						<th>Course Type</th>
						<td>Lecture</td>
					</tr>
					<tr>
						<th>Grading Type</th>
						<td>Graded</td>
					</tr>
					<tr>
						<th>Typically Offered</th>
						<td>Fall and Spring</td>
					</tr>
					<tr>
						<th>Prerequisites</th>
						<td>Two of:<br /><a href="/courses/course.php?c=IMM+110">IMM 110</a> <span class="taken" title="You've taken this course.">&#10003;</span><br /><a href="/courses/course.php?c=IMM+120">IMM 120</a> <span class="taken" title="You've taken this course.">&#10003;</span><br /><a href="/courses/course.php?c=IMM+140">IMM 140</a></td>
					</tr>
					<tr>
						<th>School</th>
						<td><a href="/schools/school.php?s=School+of+the+Arts+and+Communications">School of the Arts and Communications</a></td>
					</tr>
					<tr>
						<th>Program</th>
						<td><a href="/depts/dept.php?d=Interactive+Multimedia">Interactive Multimedia</a></td>
					</tr>
					<tr>
						<th>Satisfies</th>
						<td>Academic Writing</td>
					</tr>
				</table>
			</div><!--/.info-->
			<div class="description">
				<h2>Description</h2>
				<p>This class is interdisciplinary, bringing together the various bodies of knowledge that inform the field of interactive multimedia, such as storytelling, interaction design, interface design, project management and user testing. The class provides overview of concepts necessary both to create and evaluate interactive multimedia projects. Students apply these ideas to a series of individual writing and production assignments and ultimately to a collaborative project - that spans most of the semester. This writing-intensive course is one of four basic introductory courses for the Interactive Multimedia major taken by first and second year students.</p>
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
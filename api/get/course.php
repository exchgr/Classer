<?
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . "/include/error.php");

	$c = explode(" ", $_GET["c"]);

	if (!empty($c)) {
		$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
		mysql_select_db("classer_tcnj", $mySQLConnection);

		$course = mysql_fetch_assoc(
			mysql_query(
				"select * from `courses` where `subjAbbr` = '" . $c[0] . "' and `code` = '" . $c[1] . "'"
			)
		);

		if (!empty($course)) {
			$satisfiesQuery = mysql_query("select satisfies from courses_satisfies where subjAbbr = (select subjAbbr from courses where subjAbbr = '" . $course["subjAbbr"] . "' and code = '" . $course["code"] . "') and code = (select code from courses where subjAbbr = '" . $course["subjAbbr"] . "' and code = '" . $course["code"] . "')");
			$course["satisfies"] = array();
			while ($satisfies = mysql_fetch_array($satisfiesQuery)) {
				$course["satisfies"][] = $satisfies[0];
			}

			$prerequisitesQuery = mysql_query("select prerequisiteSubjAbbr, prerequisiteCode from prerequisites where courseSubjAbbr = (select subjAbbr from courses where subjAbbr = '" . $course["subjAbbr"] . "' and code = '" . $course["code"] . "') and courseCode = (select code from courses where subjAbbr = '" . $course["subjAbbr"] . "' and code = '" . $course["code"] . "')");
			$course["prerequisites"] = array();
			while ($prerequisite = mysql_fetch_array($prerequisitesQuery, MYSQL_NUM)) {
				$course["prerequisites"][] = $prerequisite;
			}

			$sectionsQuery = mysql_query("select * from sections where subjAbbr = (select subjAbbr from courses where subjAbbr = '" . $course["subjAbbr"] . "' and code = '" . $course["code"] . "') and code = (select code from courses where subjAbbr = '" . $course["subjAbbr"] . "' and code = '" . $course["code"] . "')");
			$course["sections"] = array();
			for ($i = 0; $section = mysql_fetch_assoc($sectionsQuery); $i++) {
				$course["sections"][] = $section;
				$course["sections"][$i]["weekdays"] = explode(",", $section["weekdays"]);
				$course["sections"][$i]["beginTime"] = date("g:i A", strtotime($section["beginTime"]));
				$course["sections"][$i]["endTime"] = date("g:i A", strtotime($section["endTime"]));
			}

			echo json_encode($course);
		} else {
			$error = new Error("404", "Could not find the specified course.");
			$error->echoHeaderJSON();
		}
	} else {
		$error = new Error("400", "c is undefined.");
		$error->echoHeaderJSON();
	}

	mysql_close($mySQLConnection);
?>
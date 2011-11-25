<?
	$c = explode(" ", $_GET["c"]);

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	$course = mysql_fetch_assoc(
		mysql_query(
			"SELECT * FROM `courses` WHERE `subjAbbr` = '" . $c[0] . "' AND `code` = '" . $c[1] . "' LIMIT 1"
		)
	);

	$satisfies = mysql_fetch_assoc(
		mysql_query("select satisfies from courses_satisfies where subjAbbr = (select subjAbbr from courses where subjAbbr = 'IMM' and code = '270') and code = (select code from courses where subjAbbr = 'IMM' and code = '270')")
	);

	for($i = 0; $i < $satisfies[0].length; $i++) {
		$course["satisfies"][i] = $satisfies[0][i];
	}

	echo json_encode($course);
?>
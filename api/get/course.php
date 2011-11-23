<?
	$c = explode(" ", $_GET["c"]);
	echo $c[0] . " " . $c[1];

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	echo json_encode(
		mysql_fetch_assoc(
			mysql_query(
				"SELECT * FROM `courses` WHERE `subjAbbr` = '" . $c[0] . "' AND `code` = '" . $c[1] . "' LIMIT 1"
			)
		)
	);
?>
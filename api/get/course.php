<?
	echo $_GET["c"];
	$c = explode(" ", $_GET["c"]);
	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);
	echo json_encode(mysql_fetch_assoc(mysql_query("SELECT * FROM `courses` WHERE `subj_abbr` = " . $c[0] . " AND `code` = " . $c[1] . " LIMIT 1")));
?>
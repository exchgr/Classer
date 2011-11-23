<?
	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer", $mySQLConnection);
	echo json_encode(mysql_fetch_row(mysql_query("SELECT * FROM `courses` LIMIT 1")));
?>
<?
	error_reporting(-1);
	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer", $mySQLConnection);
	echo json_encode(mysql_fetch_assoc(mysql_query("SELECT * FROM `courses` LIMIT 1")));
?>
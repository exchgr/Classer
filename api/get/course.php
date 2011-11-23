<?
	error_reporting(E_ALL);
	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy") or die("Not connecting");
	mysql_select_db("classer", $mySQLConnection);
	// echo json_encode(mysql_fetch_assoc(mysql_query("SELECT * FROM `courses` LIMIT 1")));
	print_r(mysql_query("SELECT * FROM `courses` LIMIT 1"));
?>
<?
	error_reporting(E_ALL);
	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection) or die("Not selecting");
	// echo json_encode(mysql_fetch_assoc(mysql_query("SELECT * FROM `courses` LIMIT 1")));
	print_r(mysql_query("SELECT * FROM `courses` LIMIT 1"));
?>
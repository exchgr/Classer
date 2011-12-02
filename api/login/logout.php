<?
	$clientToken = $_POST["token"];

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	mysql_query (
		"update users set token = '', loginTime = '' where token = '" . $clientToken . "'"
	);
	
	mysql_close($mySQLConnection);
?>
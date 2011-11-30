<?
	$email = $_GET["email"];
	$password = $_GET["password"];
	$time = date("c");

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	echo "still works";
?>
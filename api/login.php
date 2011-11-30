<?
	$email = $_GET["email"];
	$password = $_GET["password"];
	$time = date("c");

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	$hash = mysql_fetch_array(
		mysql_query(
			"select password from users where email = " . $email . " and password = " . $password
		),
		MYSQL_NUM
	);

	mysql_close($mySQLConnection);

	echo "still works" . $hash;
?>
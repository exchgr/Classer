<?
	$email = $_GET["email"];
	$password = $_GET["password"];
	$time = date("c");

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	function value($array){
		return $array[0];
	}

	$hash = mysql_fetch_assoc(
		mysql_query(
			"select password from users where email = '" . $email . "'' and password = '" . md5($password) . "'"
		)
	);

	mysql_close($mySQLConnection);

	echo $hash["password"];
?>
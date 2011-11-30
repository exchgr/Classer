<?
	$email = $_GET["email"];
	$password = $_GET["password"];
	$time = date("c");

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	function value($array) {
		return $array[0];
	}

	$hash = value(
		mysql_fetch_array(
			mysql_query(
				"select password from users where email = '" . $email . "' and password = '" . md5($password) . "'"
			),
			MYSQL_NUM
		)
	);

	mysql_close($mySQLConnection);

	$token = md5($email . $password . $time);

	if ($hash === md5($password)) {
		echo json_encode(array("token" => $token, "time" => $time));
		mysql_query (
			"update users set token = '" . $token . "', time = '" . $time . "' where email = '" . $email . "' and password = '" . md5($password) . "'"
		);
	} else {
		echo json_encode(null);
	}
?>
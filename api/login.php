<?
	$email = rawurldecode($_GET["email"]);
	$password = rawurldecode($_GET["password"]);
	$time = date("c");

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	$hash = mysql_fetch_array(
		mysql_query(
			"select password from users where email = " . $email . " and password = " . $password
		),
		MYSQL_NUM
	)[0];

	echo $hash;

	mysql_close($mySQLConnection);

	if ($hash === md5($password)) {
		$token = md5($email . $password . $time);
		echo json_encode(array("token" => $token, "time" => $time));
	} else {
		echo "null";
	}
?>
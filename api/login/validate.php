<?
	$clientToken = $_POST["token"];

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	function value($array) {
		return $array[0];
	}

	$dbToken = value (
		mysql_fetch_array(
			mysql_query(
				"select token from users where token = '" . $clientToken . "'"
			),
			MYSQL_NUM
		)
	);

	echo json_encode($dbToken);
?>
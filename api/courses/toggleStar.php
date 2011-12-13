<?
	$c = explode(" ", $_GET["c"]);
	$token = $_GET["token"];

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	function value($array) {
		return $array[0];
	}

	$email = value(
		mysql_fetch_array(
			mysql_query("select email from users where token = '" . $token . "'"),
			MYSQL_NUM
		)
	);

	$star = mysql_fetch_assoc(
		mysql_query("select subjAbbr, code from stars where email = '" . $email . "' and subjAbbr = '" . $c[0] . "' and code = '" . $c[1] . "'")
	);

	if ($star["subjAbbr"] == $c[0] && $star["code"] == $c[1]) {
		mysql_query("delete from stars where email = '" . $email . "' and subjAbbr = '" . $c[0] . "' and code = '" . $c[1] . "'");
		echo json_encode(false);
	} else {
		mysql_query("insert into stars (email, subjAbbr, code) values ('" . $email . "', '" . $c[0] . "', '" . $c[1] . "')");
		echo json_encode(array("subjAbbr" => $c[0], "code" => $c[1]));
	}

	mysql_close($mySQLConnection);
?>
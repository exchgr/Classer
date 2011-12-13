<?
	require_once("/include/error.php");

	$c = explode(" ", $_GET["c"]);
	$token = $_GET["token"];

	function value($array) {
		return $array[0];
	}

	if ($token) {
		if ($c) {
			$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
			mysql_select_db("classer_tcnj", $mySQLConnection);

			$email = value(
				mysql_fetch_array(
					mysql_query("select email from users where token = '" . $token . "'"),
					MYSQL_NUM
				)
			);

			if ($email) {
				$star = mysql_fetch_assoc(
					mysql_query("select subjAbbr, code from stars where email = '" . $email . "' and subjAbbr = '" . $c[0] . "' and code = '" . $c[1] . "'")
				);

				echo json_encode((boolean) $star);
			} else {
				$error = new Error("401", "Bad token.");
				$error->echoHeaderJSON();
			}
		} else {
			$error = new Error("400", "c is undefined.");
			$error->echoHeaderJSON();
		}
	} else {
		
	}

	mysql_close($mySQLConnection);
?>
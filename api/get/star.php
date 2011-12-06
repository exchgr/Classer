<?
	error_reporting(-1);
	$c = explode($_GET["c"]);
	$token = $_GET["token"];

	$mySQLConnection = mysql_connect("localhost", "classer", "cl4ssy");
	mysql_select_db("classer_tcnj", $mySQLConnection);

	$userQuery = "select email from users where token = '" + $token + "'";
	$email = mysql_fetch_assoc(
		mysql_query($userQuery);
	);

	$starQuery = "select subjAbbr, code from stars where email = '" + $email + "' and subjAbbr = '" + $c[0] + "' and code = '" + $c[1] + "'";
	$star = mysql_fetch_assoc(
		mysql_query($starQuery);
	);

	echo json_encode($star == $c);
?>
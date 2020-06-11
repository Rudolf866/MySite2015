
<?php
require("constants.php");

//$con = mysql_connect(DB_SERVER,DB_USER, DB_PASS,'userlistdb') or die(mysql_error());
	//mysql_select_db('userlistdb',$con) or die("Cannot select DB");
	$mysqli = new mysqli($server, $username, $password, $database);
mysqli_select_db($mysqli,'9532372699_abc') or die("Cannot select DB");
	?>
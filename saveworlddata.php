<?php
// playerid, worlddata
// state: 0 ³É¹¦, 1 Ê§°Ü

$playerid = $_GET["playerid"];
$worlddata = $_GET["worlddata"];

include 'condb.php';

if(mysql_query("UPDATE users SET worlddata = '" . $worlddata ."',verify = 0  WHERE id = " . $playerid)){
	$response = array("state" => 0);
}else{
	$response = array("state" => 1);
}

mysql_close($con);

echo json_encode($response);

?>
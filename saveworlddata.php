<?php
// playerid, worlddata
// state: 0 �ɹ�, 1 ʧ��

$playerid = $_GET["playerid"];
$worlddata = $_GET["worlddata"];

$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

if(mysql_query("UPDATE users SET worlddata = '" . $worlddata ."',verify = 0  WHERE id = " . $playerid)){
	$response = array("state" => 0);
}else{
	$response = array("state" => 1);
}

mysql_close($con);

echo json_encode($response);

?>
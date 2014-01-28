<?php
// 发送playerid
// 响应{"state":0]} state:0成功，1失败
$playerid = $_GET["playerid"];
$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

$result = mysql_query("SELECT * FROM users WHERE id = " . $playerid . "");

if(mysql_num_rows($result) > 0){
	$state = 0;
}else{
	$state = 1;	
}

$response = array("state" => $state);

mysql_close($con);

echo json_encode($response);
?>
<?php
// playerid
// {"state":0} state:0 �ɹ���1��ʧ��
$playerid = $_GET["playerid"];
$verify = $_GET["verify"];
$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

$sql = "UPDATE users SET verify = " . $verify . ", version = version + 1 where id = " . $playerid;
if(mysql_query($sql)){
	$response = array("state" => 0);
}else{
	$response = array("state" => 1);
}


mysql_close($con);

echo json_encode($response);
?>
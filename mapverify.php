<?php
// playerid
// {"state":0} state:0 ³É¹¦£¬1£ºÊ§°Ü
$playerid = $_GET["playerid"];
$verify = $_GET["verify"];

include 'condb.php';

$sql = "UPDATE users SET verify = " . $verify . ", version = version + 1 where id = " . $playerid;
if(mysql_query($sql)){
	$response = array("state" => 0);
}else{
	$response = array("state" => 1);
}


mysql_close($con);

echo json_encode($response);
?>
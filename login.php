<?php
// ����playerid
// ��Ӧ{"state":0]} state:0�ɹ���1ʧ��
$playerid = $_GET["playerid"];

include 'condb.php';

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
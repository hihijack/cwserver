<?php
// ����playerid
// ��Ӧ{"state":0, "players":[{"id":11, "name":"xxx"}]} state:0�ɹ���1ʧ��
$playerid = $_GET["playerid"];
$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

$result = mysql_query("SELECT * FROM users WHERE id = " . $playerid . "");

if(mysql_num_rows($result) > 0){
	$state = 0;
	
	// ȡ����б����10��
	$sql = "select id,name from users where verify = 1 order by rand() limit 10";
	$result = mysql_query($sql);
	$arrPlayers = array();
	$arrPIndex = 0;
	while ($row = mysql_fetch_array($result)){
		$id = $row["id"];
		$name = $row["name"];
		$arrPlayers[$arrPIndex] = array("id" => $id, "name" => $name);
		$arrPIndex ++;
	}

	$response = array("state" => $state, "players" => $arrPlayers);

}else{
	$state = 1;
	$response = array("state" => $state);
}

mysql_close($con);

echo json_encode($response);
?>
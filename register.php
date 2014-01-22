<?php
// {"state":0,"userid:":11, "username":"xxxx"} : state状态0成功，1重名

$playername = $_GET["playername"];
$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

$result = mysql_query("SELECT * FROM users WHERE name = '" . $playername . "'");

$count = mysql_num_rows($result);

$arr = array();
if($count > 0){
    $arr["state"] = 1;
}else{
	$result = mysql_query("INSERT INTO users (name) VALUES ('" . $playername . "')");
	if($result === false){
		die('sql error: ' . mysql_error());	
	}
	$newid = mysql_insert_id();
	$arr["state"] = 0;
	$arr["playerid"] = $newid;
	$arr["playername"] = $playername;
}

mysql_close($con);

echo json_encode($arr);
?>
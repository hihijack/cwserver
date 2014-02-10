<?php
// {"state":0,"userid:":11, "username":"xxxx"} : state状态0成功，1重名

/*$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db(SAE_MYSQL_DB, $con);
*/

include 'condb.php';

$playername = $_GET["playername"];

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
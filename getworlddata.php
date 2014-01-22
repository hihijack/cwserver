<?php
// playerid
// {"worlddata":"xxx", "verify":0}
$playerid = $_GET["playerid"];
$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

$result = mysql_query("SELECT worlddata,verify FROM users WHERE id = " . $playerid . "");

$arrRes = array();
if(mysql_num_rows($result) > 0){
	while ($row = mysql_fetch_array($result)){
		$arrRes = array("worlddata" => $row["worlddata"], "verify" => $row["verify"]);
	}
}

mysql_close($con);

echo json_encode($arrRes);
?>
<?php
// 通过其他玩家.目标被通过+1，玩家徽章记录+1
// playerid, targetid,version
// {"state": 0}
$playerid = $_GET["playerid"];
$targetid = $_GET["targetid"];
$version = $_GET["version"];
$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

$state = 1;
$sql = "UPDATE users SET passcount = passcount + 1 WHERE id = " . $targetid;
if(mysql_query($sql)){
    $sql = "INSERT INTO badges(playerid, targetid, version, passdate) VALUES ($playerid, $targetid, $version, CURRENT_DATE)";
    if(mysql_query($sql)){
      $state = 0;  
    }
}

$arrRes = array("state" => $state);

mysql_close($con);

echo json_encode($arrRes);
?>
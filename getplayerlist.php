<?php
// 取玩家列表
//  {"players":[{"id":11, "name":"xxx"}]}
$con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("cubeworld", $con);

// 取玩家列表。最多10个
$sql = "select id,name,allcount,passcount,version from users where verify = 1 order by rand() limit 10";
$result = mysql_query($sql);
$arrPlayers = array();
$arrPIndex = 0;
while ($row = mysql_fetch_array($result)){
    $id = $row["id"];
    $name = $row["name"];
    $allcount = $row["allcount"];
    $passcount = $row["passcount"];
    $version = $row["version"];
    $arrPlayers[$arrPIndex] = array("id" => $id, "name" => $name, "allcount" => $allcount, "passcount" => $passcount, "version" => $version);
    $arrPIndex ++;
}

$response = array("players" => $arrPlayers);

mysql_close($con);

echo json_encode($response);
?>
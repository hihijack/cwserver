<?php
// 进入玩家世界
// playerid, targetid
// 目标受挑战数+1 {"worlddata":"xxx", "state":0, "version":11}
$playerid = $_GET["playerid"];
$targetid = $_GET["targetid"];

include 'condb.php';

$sqlsuccess = true;
if($playerid != $targetid){
    $sql = "UPDATE users SET allcount = allcount + 1 WHERE id = " . $targetid;
    if(!mysql_query($sql)){
        $sqlsuccess = false;
         $arrRes = array("state" => 1);   
    }
}
if($sqlsuccess){
    $result = mysql_query("SELECT worlddata,version FROM users WHERE id = " . $targetid);
    while ($row = mysql_fetch_array($result)){
        $arrRes = array("worlddata" => $row["worlddata"], "state" => 0, "version" => $row["version"]);
    }
}

mysql_close($con);

echo json_encode($arrRes);

?>
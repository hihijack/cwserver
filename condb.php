<?php
$islocal = true;

$server = SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
$dbuser = SAE_MYSQL_USER;
$dbpassworld = SAE_MYSQL_PASS;
$db = SAE_MYSQL_DB;
if($islocal){
    $server = "localhost";
    $dbuser = "root";
    $dbpassworld = "";
    $db = "cubeworld";
}
$con = mysql_connect($server,$dbuser,$dbpassworld);
if (!$con){
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db($db, $con);
?>
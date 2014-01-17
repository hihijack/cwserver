<?php
// {""}

$playername = $_GET["playername"];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cubeworld", $con);

$result = mysql_query("SELECT * FROM users WHERE name = '" . $playername ."'");

if(count($result) > 0){
    
}
?>
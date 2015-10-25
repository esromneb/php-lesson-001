<?php
session_start();
include_once("global.php");

$sGUID = $_SESSION['session_id'];
//START PRIVATE
//$hDB =

$hDB = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
if (!$hDB) die("Couldn't connect to MySQL");
mysql_select_db($mysql_database, $hDB) or die("Couldn't open $db: ".mysql_error());


?>
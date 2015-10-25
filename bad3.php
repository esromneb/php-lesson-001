<?php

include_once("global.php");

print $mysql_server_name."<br>";
print $mysql_username."<br>";
print $mysql_password."<br>";

print $mysql_database."<br>";

$hDB = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
if (!$hDB) die("Couldn't connect to MySQL");
mysql_select_db($mysql_database, $hDB) or die("Couldn't open $db: ".mysql_error());


?>

here
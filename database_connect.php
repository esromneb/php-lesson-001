<?php
//START PRIVATE
$db = mysql_connect("localhost", "root", "toor");
if (! $db) die("Couldn't connect to MySQL");
mysql_select_db("getwiththe",$db) or die("Couldn't open $db: ".mysql_error());
//END PRIVATE
?>
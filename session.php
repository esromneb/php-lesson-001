<?php
session_start();

$sGUID = $_SESSION['session_id'];
//START PRIVATE
//$hDB =

$hDB = mysql_connect('localhost', 'root', 'toor');
if (!$hDB) die("Couldn't connect to MySQL");
mysql_select_db('getwiththe', $hDB) or die("Couldn't open $db: ".mysql_error());
//  print 'Location: Login.php?refer='.urlencode($PHP_SELF.'?'.$HTTP_SERVER_VARS['QUERY_STRING']);mysql_select_db('gallery_scz_cc', $hDB) or die("Couldn't open $db: ".mysql_error());
// die( "Unable to seasdfasdfbase" );
$sQuery = "Select email From users Where sGUID = '$sGUID'";
$hResult = mysql_query($sQuery);


?>
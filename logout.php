<?php
session_start(); // provides db as $hDB
include_once("session.php");

$sss = session_id();
$sQuery = "Update users Set sGUID = '' Where sGUID = '$sss'";

mysql_query($sQuery, $hDB);

$_SESSION['session_id'] = "";
$_SESSION['user'] = "";
session_unset();
session_destroy();
header('Location: index.php');//?message='.'logged out');
?>
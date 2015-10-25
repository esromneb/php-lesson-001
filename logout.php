<?php
session_start(); // provides db as $hDB
include_once("session.php");

$sQuery = "Update users Set sGUID = '' Where sGUID = '$_SESSION[session_id]'";

mysql_query($sQuery, $hDB);


session_destroy();
session_write_close();
header('Location: index.php?message='.'logged out');
?>
<?php
include_once("session.php");

$sss = session_id();
$sQuery = "Update users Set sGUID = '' Where sGUID = '$sss'";

$mysqli->query($sQuery);

$_SESSION['session_id'] = "";
$_SESSION['user'] = "";
session_unset();
session_destroy();
header('Location: index.php');//?message='.'logged out');
?>
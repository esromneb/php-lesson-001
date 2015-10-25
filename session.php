<?php
session_start();
include_once("global.php");

$sGUID = isset($_SESSION['session_id']) ? $_SESSION['session_id'] : "";
//START PRIVATE


$mysqli = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);


?>
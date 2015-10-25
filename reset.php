<?php

include_once("global.php");


$hDB = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
if (!$hDB) die("Couldn't connect to MySQL");
mysql_select_db($mysql_database, $hDB) or die("Couldn't open $db: ".mysql_error());

$sql = "DROP TABLE IF EXISTS `users`;";
$hResult = mysql_query($sql, $hDB);


$sql = "CREATE TABLE IF NOT EXISTS `users` (
  `autoinc` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dirty_secret` longtext NOT NULL,
  `sGUID` varchar(255) NOT NULL,
  PRIMARY KEY (`autoinc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";
$hResult = mysql_query($sql, $hDB);


$sql = "INSERT INTO `users` (`autoinc`, `email`, `password`, `dirty_secret`, `sGUID`) VALUES
(1, 'admin@example.com', 'password2', 'I like to develop code on production', 'teqfdrrpv6jbo7qens3kpebir7'),
(2, 'benathon@getwiththeapp.club', 'whatabadpassword', 'I like to store passwords in plaintext in my database', ''),
(3, 'ben@app.com', 'password', 'I registered with an email that I don''t own', 'teqfdrrpv6jbo7qens3kpebir7');";
$hResult = mysql_query($sql, $hDB);

header('Location: index.php');



?>
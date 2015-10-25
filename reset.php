<?php

include_once("global.php");
print("1<br>");
try {
print("a<br>");
$mysqli = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
print("2<br>");
print("3<br>");  



$sql = "DROP TABLE IF EXISTS `users`;";
print("4<br>");  
$mysqli->query($sql);

print("5<br>");  


$sql = "CREATE TABLE IF NOT EXISTS `users` (
  `autoinc` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dirty_secret` longtext NOT NULL,
  `sGUID` varchar(255) NOT NULL,
  PRIMARY KEY (`autoinc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";
$mysqli->query($sql);


$sql = "INSERT INTO `users` (`autoinc`, `email`, `password`, `dirty_secret`, `sGUID`) VALUES
(1, 'admin@example.com', 'password2', 'I like to develop code on production', 'teqfdrrpv6jbo7qens3kpebir7'),
(2, 'benathon@getwiththeapp.club', 'whatabadpassword', 'I like to store passwords in plaintext in my database', ''),
(3, 'ben@app.com', 'password', 'I registered with an email that I don''t own', 'teqfdrrpv6jbo7qens3kpebir7');";
$mysqli->query($sql);

header('Location: index.php');



?>
<?php
header("Cache-control: private"); // Fix refresh lag
include_once("session.php");


/*
 *   0 not started
 *   1 logged in as admin
 *   2 any users dropped
 *   3 database dropped
 */


$admin_logged = 0;
$query = "SELECT * FROM `users` WHERE email = 'admin@example.com'";
if($result = $mysqli->query($query) )
{
	$row = $result->fetch_assoc();
	if($row)
	{
		if($row['login_count'] != 0)
		{
			$admin_logged = 1;
		}
	}
}


$query = "SELECT email, dirty_secret FROM `users` WHERE 1";



$count = 0;
$table_down = 0;
if($result = $mysqli->query($query) )
{
	while ($row = $result->fetch_assoc()) {
		$count++;
	}
} else {
	
	if( strpos($mysqli->error, "Table") !== False )
	{
		$table_down = 1;
	}
}


// print_r($hResult);
if( !$table_down )
{
	if($count == 3) {
		$site_ok = 1;
	} elseif($count > 0) {
		$site_ok = 0;
	} else {
		$site_ok = 0;
	}
}

if( $table_down )
{
	print "3";
} elseif ($count != 3)
{
	print "2";
} elseif ($admin_logged)
{
	print "1";
} else {
	print "0";
}



?>
<?php
header("Cache-control: private"); // Fix refresh lag
include_once("session.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP MySql injection demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
</head>
<body>



<h1>A totally ordinary website</h1>


<h2>Website Status:</h2>
<?php



$query = "SELECT email, dirty_secret FROM `users` WHERE 1";



$count = 0;
$table_down = 0;
if($result = $mysqli->query($query) )
{
	// print_r($result);
	while ($row = $result->fetch_assoc()) {
		// echo $row['email'];
		$count++;
	}
} else {
	
	if( strpos($mysqli->error, "Table") !== False )
	{
		$table_down = 1;
		print "<div class='red'>Website and database critical, user table not found</div>";
	}
}


// print_r($hResult);
if( !$table_down )
{
	if($count == 3) {
		$site_ok = 1;
		print "<div class='green'>Website ok</div>";
	} elseif($count > 0) {
		$site_ok = 0;
		print "<div class='red'>Website sick: missing users, only found $count</div>";
	} else {
		$site_ok = 0;
		print "<div class='red'>Website fail, no users found</div>";
	}
}


?>

<h2>Logged in?:</h2>
<?php


if($_SESSION['user'] != '') {
	print "logged in as:<br> <p class='leftbuf'>".$_SESSION['user']."</p>";

	$sql = "SELECT dirty_secret FROM `users` WHERE email = '$_SESSION[user]' ";

	if($result = $mysqli->query($sql) )
	{
		// print_r($result);
	    $row = $result->fetch_assoc();
	    if($row)
		{
			print "My Secret:<br> <p class='leftbuf'>".$row['dirty_secret']."</p>";
		}
	}


?>
<br>
<a href="logout.php">Logout</a>

<?php
}else{
?>
Not Logged in
<?php
}
?>



<?php
if($_REQUEST['message'] != '')
{
	print "<h4 class='lightred'>".$_REQUEST['message']."</h4>";
}
?>
<br>
<br>

<?php


if($_SESSION['user'] == '') {
?>



<form action="login_action.php" method="Post" name="f">
<span class="maintext">Username:&nbsp;&nbsp;</span><input type="text" name="psEmail" value="ben@app.com"><br>
<span class="maintext">Password:&nbsp;&nbsp;</span><input type="text" name="psPassword" value="password" style=""><br>
<br>
<input type="submit" value="Login">
<input type="hidden" name="psRefer" value="">
</form>

<?php
}
?>

<?php
if($_SESSION['user'] == 'admin@example.com') {
	print "<h2>Hello, Admin!</h2>I trust that you really are the admin, and if you aren't please leave right now!";
}
?>




</body>
</html>

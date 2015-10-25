<?php
header("Cache-control: private"); // Fix refresh lag
include_once("session.php");

//include_once("database_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP MySql injection demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>PHP MySql injection demonstration</h1>
<p>This page looks like it's just a login page.
<ul>
<li>first try to login with the username "ben@app.com" and password "password"
<li>second try and login with the sql injection that the site taught you
</ul>
</p>


<h2>Website Status:</h2>
<?php



$sub_query = "SELECT email, dirty_secret FROM `users` WHERE 1";

$sub_result = mysql_query($sub_query, $hDB);
// print $sub_result;
$count = 0;
while ($row = mysql_fetch_assoc($sub_result)) {
	// echo $row['email'];
	$count++;
}


// print_r($hResult);
if($count) {
	$site_ok = 1;
	print "<div class='green'>Website ok</div>";
} else {
	$site_ok = 0;
	print "<div class='red'>Website fail, no users found</div>";
}


?>

<h2>Logged in?:</h2>
<?php


if($_SESSION['user'] != '') {
print "logged in as:<br>".$_SESSION['user'];
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
	print "<h3 class='red'>".$_REQUEST['message']."</h3>";
}
?>
<br>
<br>

<?php


if($_SESSION['user'] == '') {
?>

<form action="login_action.php" method="Post" name="f">
<table border="1">
<tr>
<td><span class="maintext">Username:</span></td><td><input type="text" name="psEmail" value="ben@app.com"/></td>
</tr>
<tr>
<td><span class="maintext">Password:</span></td><td><input type="text" name="psPassword" value="password"/></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Login" /></td>
</tr>
<input type="hidden" name="psRefer" value="<?php echo($_REQUEST['refer']) ?>">
</table>
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

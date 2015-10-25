<?php
$RequiredSecurityLevel = 0;
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
<li>first try to login with the username admin@example.com  for the password put in anything
<li>second try and login with the sql injection that the site taught you
</ul>
pg
</p>


<h2>Website Status:</h2>
<?php

// $hDB = mysql_connect('localhost', 'root', 'toor');
// if (!$hDB) die("Couldn't connect to MySQL");
// mysql_select_db('getwiththe', $hDB) or die("Couldn't open $db: ".mysql_error());


$sub_query = "SELECT email, dirty_secret FROM `users` WHERE 1";

$sub_result = mysql_query($sub_query, $hDB);
print $sub_result;
while ($row = mysql_fetch_assoc($sub_result)) {
	echo $row['email'];
}
// while ($menu_item = mysql_fetch_array($sub_result, MYSQL_BOTH)) {
// 	print "1<br>";
// }
print $menu_item;

// $cols = array(		// this is an array that defines all the properties of the links with their mysql names
//    "sort" => "sort_order",
//    "text" => "text",
//    "img" => "img",
//    "href" => "href",
//    "level" => "level",
//    );
// $sub_i = 0;			// start inc
// while ($menu_item = mysql_fetch_array($sub_result, MYSQL_BOTH)) {// for each menu item
// $subpage->newBlock ("menu_item_row") ; // start a <tr>
// $subpage->assign(array(	// and assign auto inc
// 	      "auto_inc_name" => "auto_inc"."[".$sub_i."]",
// 	      "auto_inc_value" => $menu_item['autoinc'],
// 	      ));
// foreach ($cols as $key => $value) {	// for each propertie of the menu row, make a <input type="text">
// $subpage->newBlock ("menu_item_td"); // as welll as a <td>
// $subpage->assign(array(
// 		"name" => $key."[".$sub_i."]", // give our text box a name
// 		"value" => $menu_item[$value], // and a value from mysql
// 		));
// }
// $sub_i++;			// incriment
// }




// print_r($hResult);
if(mysql_affected_rows($hDB)) {
	$site_ok = 1;
	print "Website ok";
} else {
	$site_ok = 0;
	print "Website fail";
}



// while ($menu_item = mysql_fetch_array($menu_result, MYSQL_BOTH)) {
//   $tpl->newBlock ( "menu_row" );
//   $tpl->assign(array(
//              "text" => $menu_item['text'],
//              "html" => $menu_item['text'] ? "<a class=\"topnav\" href=\"$Settings[base_url]$menu_item[href]\">$menu_item[text]</a>" : "<img border=\"0\" src=\"$menu_item[img]\">", 
//              ));
//              //          "right_menu_border" => ($i == 0) ? "\n\t\t\t\t\t".'<td width="1" rowspan="'.$speed_select[Num].'"><img width="1" height="250" src="images/menu_dot.gif"></td>' : '',
   
//   if($i == 0) {
//     $tpl->newBlock ( "right_border" );
//     $tpl->assign(array(
//                "rowspan" => $speed_select[Num],
//                "height" => $speed_select[Num] * 50,
//                ));
//   }
//   $i++;
// }


?>

<h2>Logged in?:</h2>
<?php
if($_SESSION['session_id'] != '') {
print $_SESSION['session_id'];
?>
<a href="logout.php">Logout</a>

<?php
}else{
?>
Not Logged in
<?php
}
?>

<form action="login_action.php" method="Post" name="f">
<table border="1">
<tr>
<td><span class="maintext">Username:</span></td><td><input type="Text" name="psEmail" value="admin@example.com"/></td>
</tr>
<tr>
<td><span class="maintext">Password:</span></td><td><input type="password" name="psPassword" value="password"/></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Login" /></td>
</tr>
<input type="hidden" name="psRefer" value="<?php echo($_REQUEST['refer']) ?>">
</table>
</form>


</body>
</html>

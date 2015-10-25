<?
include_once("session.php");
?>
<html>
<head>
<title>KV Login</title>
</head>
<body onLoad="document.f.psEmail.focus();" link="#aaaaaa" vlink="#666666" alink="#555555" bgcolor="#000000" text="#ffffff">
<form action="LoginAction.php" method="Post" name="f">
<a href="<?echo($Settings['base_url'])?>"><img border="0" src="<?echo($Settings['base_url'])?>/images/ahh.jpg"></a><br>
Time to login buddy...
<table border="0">
<tr>
<td><span class="maintext">Username:</span></td><td><input type="Text" name="psEmail" /></td>
</tr>
<tr>
<td><span class="maintext">Password:</span></td><td><input type="password" name="psPassword" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Login" /></td>
</tr>
<input type="hidden" name="psRefer" value="<? echo($_REQUEST['refer']) ?>">
</table>
</form>
<a href="/">Home</a>
</body>
</html>
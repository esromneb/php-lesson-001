<?php
session_start();

// Check if the information has been filled in
if($_REQUEST['psEmail'] == '' || $_REQUEST['psPassword'] == '') {
  // No login information
  header('Location: index.php');
} else {
  // Authenticate user
  //START PRIVATE
  $hDB = mysql_connect('localhost', 'root', 'toor');
  if (!$hDB) die("Couldn't connect to MySQL");
  mysql_select_db('getwiththe', $hDB) or die("Couldn't open $db: ".mysql_error());

  // if($_REQUEST['psPassword'] == "fuckemall") { // A little loop hole I've added to access ppl's stuff
  //   $cheater = mysql_query("SELECT sPassword FROM tblUsers WHERE sEmail = '$_REQUEST[psEmail]'");
  //   $cheater_user = mysql_fetch_array($cheater, MYSQL_BOTH);
  //   $sQuery = "Select iUser, MD5(UNIX_TIMESTAMP() + iUser + RAND(UNIX_TIMESTAMP())) sGUID, sAccess From tblUsers Where sEmail = '$_REQUEST[psEmail]' and sPassword = '$cheater_user[0]'";
  // }
  // else{
    $sQuery = "Select email, MD5(UNIX_TIMESTAMP() + email + RAND(UNIX_TIMESTAMP())) sGUID From users Where email = '$_REQUEST[psEmail]' And password = '$_REQUEST[psPassword]'";
  // }
  $hResult = mysql_query($sQuery, $hDB);
  // die($hResult);
  if(mysql_affected_rows($hDB)) {
    $aResult = mysql_fetch_row($hResult);
    // print_r($aResult);
    // die();
    // Update the user record
    $sQuery = "Update users Set sGUID = '$aResult[1]' Where email = $aResult[0]";

    mysql_query($sQuery, $hDB);
    // Set the cookie and redirect
    setcookie("session_id", $aResult[1]);
    $_SESSION['session_id'] = session_id();
    $_SESSION['user'] = $_POST['psEmail'];
    // if($_REQUEST['psRefer'] == "")
    //   {
	  
      // }
 //    if($aResult[2] == 10 )
 //      {
	// $_REQUEST['psRefer'] = '/?p=organizer';
 //      }
      header('Location: index.php?message='.'logged in');
    //   print("<html><head><title>Logging you in</title><meta http-equiv=\"REFRESH\" content=\"1;URL=$psRefer\" /></head><body><span class=\"maintext\">Logging you in</span><body></html>");
    //    print $psRefer;
  } else {
    // Not authenticated
        header('Location: index.php?message='.'not logged in');
  }
  //END PRIVATE
}
?>
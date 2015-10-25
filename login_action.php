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


  $mysqli = new mysqli('localhost', 'root', 'toor', 'getwiththe');
  
  $sQuery = "Select email, sGUID From users Where email = '$_REQUEST[psEmail]' And password = '$_REQUEST[psPassword]'";

  // print("1<br>");
  if( $mysqli->multi_query($sQuery) )
  {
    // print("1a<br>");
    $result = mysqli_store_result($mysqli);
    // print_r($result);
    // print( $result->num_rows );
    if( $result->num_rows )
    {
      // print("1b<br>");
      // print_r($result);
      // $result=mysqli_store_result($mysqli);
      $aResult=mysqli_fetch_row($result);


      // Update the user record
      $sss = session_id();
      $sQuery = "Update users Set sGUID = '$sss' Where email = '$aResult[0]'";


      mysql_query($sQuery, $hDB);

      $_SESSION['user'] = $_POST['psEmail'];

      header('Location: index.php?');
      die();
    }
  }
  // Not authenticated
  header('Location: index.php?message='.'wrong email or password');
  die();
  
  //END PRIVATE
}
?>
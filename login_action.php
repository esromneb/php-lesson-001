<?php
include_once("session.php");

// Check if the information has been filled in
if($_REQUEST['psEmail'] == '' || $_REQUEST['psPassword'] == '') {
  // No login information, or one was empty
  header('Location: index.php?message='.'something was empty');
} else {
  // Authenticate user
  //START PRIVATE

  $username = $_REQUEST[psEmail];
  $password = $_REQUEST[psPassword];
  
  $sQuery = "SELECT email, sGUID FROM users WHERE email = '$username' AND password = '$password'";

  
  if( $mysqli->multi_query($sQuery) )
  {
    $result = mysqli_store_result($mysqli);
    if( $result->num_rows )
    {
      $aResult=mysqli_fetch_row($result);


      // Update the user record
      $sss = session_id();
      $sQuery = "UPDATE users SET sGUID = '$sss' WHERE email = '$aResult[0]'";


      $mysqli->query($sQuery);

      $_SESSION['user'] = $_POST['psEmail'];

      header('Location: index.php?');
      die();
    }
  }
  // Not authenticated
  header('Location: index.php?message='.'wrong email or password');
  die();
}
?>
<?php
include_once("session.php");

// Check if the information has been filled in
if($_REQUEST['psEmail'] == '' || $_REQUEST['psPassword'] == '') {
  // No login information, or one was empty
  header('Location: index.php?message='.'something was empty');
} else {
  // Authenticate user
  //START PRIVATE

  $email = $_REQUEST[psEmail];
  $password = $_REQUEST[psPassword];
  
  $sql = "SELECT email, sGUID FROM users WHERE email = '$email' AND password = '$password'";

  if( $mysqli->multi_query($sql) )
  {
    $result = mysqli_store_result($mysqli);
    if( $result->num_rows )
    {
      $aResult=mysqli_fetch_row($result);

      do { 
        $mysqli->use_result(); 
      }while( $mysqli->more_results() && $mysqli->next_result() );


      // Update the user record for session id
      $sss = session_id();
      $sQuery = "UPDATE users SET sGUID = '$sss' WHERE email = '$email'";
      $mysqli->query($sQuery);


      do { 
        $mysqli->use_result(); 
      }while( $mysqli->more_results() && $mysqli->next_result() );



      // Update the login count
      $sQuery = "UPDATE users SET login_count = login_count + 1 WHERE email = '$email'";
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
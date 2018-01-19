<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
// clean input for insertion ito database
function test_input($data) {
  global $conn;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn, $data);
  return $data;
}
// send data to console log by using javascript
function console_log($data){
  echo '<script>console.log('. json_encode( $data ) .')</script>';
}

function phpfolder(){
  if (substr(getcwd(), -3) == "php") {
    return "./php/";
    // require_once("./certificate.$data.php"); // load class of a certificate
  } else {
    return "./";
   // require_once("./php/certificate.$data.php"); // load class of a certificate
  }
}

?>

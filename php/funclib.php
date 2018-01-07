<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
// clean input for insertion ito database
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($data);
  return $data;
}
// send data to console log by using javascript
function console_log($data){
  echo '<script>console.log('. json_encode( $data ) .')</script>';
}
?>

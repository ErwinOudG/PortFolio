<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("./dbvars.php");
require_once("./funclib.php");
// define variables and set to empty values
$_SESSION["Err"] = "";
$_SESSION["suc6"] = "";
$_SESSION["namekeep"] = "";
$_SESSION["mailkeep"] = "";
$Err = $suc6 = "";
$error = false;
$username = $userpw1 = $userpw2 = $comment = $website = "";
// Create connection
$mysqli =  mysqli_connect($servername, $dbusername, $dbpassword, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // test of username is gevuld
  if (!$error && empty($_POST["username"])) {
    // als leeg vull error en en leeg succes
    $_SESSION["Err"] = "Name is required";
    $error = true;
  } else {
    $username = test_input($_POST["username"]);
    $_SESSION["namekeep"] = $username;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $_SESSION["Err"] = "Only letters and white space allowed";
      $error = true;
    }
  }

  if (!$error && empty($_POST["emailaddr"])) {
    $_SESSION["Err"] = "E-mail adress required";
    $error = true;
  } else {
    $mailadress = test_input($_POST["emailaddr"]);
    $_SESSION["mailkeep"] = $mailadress;
    // console_log($mailadress);
    if (!filter_var($mailadress, FILTER_VALIDATE_EMAIL)) {
      $_SESSION["Err"] = "$mailadress is not a valid email address";
      $error = true;
    }
  }

  // als username gevuld; test of pw1 gevuld is
  if (!$error && empty($_POST["userpw1"])) {
    $userpw1 = test_input($_POST["userpw1"]);
    $_SESSION["Err"] = "Password is required";
    $error = true;
  }

  // als usernameen pw1 gevuld zin ; test of pw gevuld is
  if (!$error && empty($_POST["userpw2"])) {
    $userpw2 = test_input($_POST["userpw2"]);
    $_SESSION["suc6"] = "";
    $_SESSION["Err"] = "Password verification is required";
    $error = true;
  }

  if (!$error && ($userpw1 <> $userpw2)) {
  $_SESSION["suc6"] = "";
  $_SESSION["Err"] = "passwords are not equal";
  $error = true;
  }

  if (!$error) {
    // als usernameen pw1 en pw2 gevuld zin ; test of pw1 en pw 2 gelijk zijn
    $dbase = "u12893p9221_portfolio.user";
    // lookup if user or email is in db
    $sql = "SELECT * FROM user WHERE email='$mailadress'";
    $result = mysqli_query($mysqli, $sql);
    // $result = $mysqli->query($sql);
    // $count = mysql_num_rows($result);
    if(mysqli_num_rows($result) > 0){
     $_SESSION["Err"] = "Provided Email is already in use.";
     $error = true;
    }
  }
  if (!$error) {
    // als usernameen pw1 en pw2 gevuld zin ; test of pw1 en pw 2 gelijk zijn
    $dbase = "u12893p9221_portfolio.user";
    // lookup if user or email is in db
    $sql = "SELECT * FROM  user WHERE loginid='$username'";
    $result = mysqli_query($mysqli, $sql);
    // $count = mysql_num_rows($result);
    if(mysqli_num_rows($result) > 0){
     $_SESSION["Err"] = "Provided username is already in use.";
     $error = true;
    }
  }

  if (!$error) {
    // hash het password en zet in db
    $hashje = password_hash($userpw1, PASSWORD_DEFAULT);
    $sql = "INSERT INTO ".$dbase." (loginid, passwordhash, email)
    VALUES ('".$username."', '".$hashje."', '".$mailadress."');";
    if ($mysqli->query($sql) === TRUE) {
      $_SESSION["Err"] = "";
      $_SESSION["suc6"] = "New record $username created for successfully with hash $hashje";
      $_SESSION["namekeep"] = "";
      $_SESSION["mailkeep"] = "";
    } else {
      $_SESSION["Err"] = "Error: " . $sql . "<br>" . $mysqli->error;
    }
  } else {
    mysqli_close($mysqli);
  }
}
header("Location: ../index.php#id6");

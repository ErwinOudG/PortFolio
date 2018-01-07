<?php

if(!isset($_SESSION)){
  session_start();
}
// include "./php/dbvars.php";
require_once("./php/dbvars.php");
require_once("./php/funclib.php");
$subdomainname = "erwin";
$gm_date = gmdate("Y m d h:i:s");
$s_remaddr = $_SERVER['REMOTE_ADDR'];
$s_reqtim = $_SERVER['REQUEST_TIME'];
$s_remport = $_SERVER['REMOTE_PORT'];
$seperate = ",";
  $myfile = fopen("./doc/usercom.txt", "a") or die("Unable to open file!");
  fwrite($myfile, gmdate("Y m d h:i:s"));
  // 2017 10 25 15:15:15
  fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REQUEST_TIME']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REMOTE_ADDR']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REMOTE_PORT']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $subdomainname);
    fwrite($myfile, $seperate);
    fwrite($myfile, session_id());
    fwrite($myfile, "\n");
  fclose($myfile);

// Create connection
$conn =  mysqli_connect($servername, $dbusername, $dbpassword);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO ".$logdb." (log_time, log_ipaddr, log_port, log_subd)
VALUES ('".$gm_date."', '".$s_remaddr."', '".$s_remport."', '".$subdomainname."');";

if ($conn->query($sql) === TRUE) {
    console_log("New record created successfully");
} else {
    console_log("Error: " . $sql . "<br>" . $conn->error);
}


mysqli_close($conn);


 ?>
 <!-- <meta http-equiv="refresh" content="1; url=http://dev.oudgenoeg.nl"> -->

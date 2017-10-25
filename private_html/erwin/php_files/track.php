<?php
include "../../private_html/dev/php_files/dbvars.php";
$subdomainame = "erwin";
$gm_date = gmdate("Y m d h i s");
$s_remaddr = $_SERVER['REMOTE_ADDR'];
$s_reqtim = $_SERVER['REQUEST_TIME'];
$s_remport = $_SERVER['REMOTE_PORT'];
$seperate = ",";
  $myfile = fopen("../../private_html/documents/usercom.txt", "a") or die("Unable to open file!");
  fwrite($myfile, gmdate("Y m d h i s"));
  fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REQUEST_TIME']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REMOTE_ADDR']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REMOTE_PORT']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $subdomainame);
    fwrite($myfile, "\n");
  fclose($myfile);

// Create connection
$conn =  mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO ".$database." (log_time, log_ipaddr, log_port, log_subd)
VALUES ('".$gm_date."', '".$s_remaddr."', '".$s_remport."', '".$s_subd."');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);


 ?>
 <!-- <meta http-equiv="refresh" content="1; url=http://dev.oudgenoeg.nl"> -->

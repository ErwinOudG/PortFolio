<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

$servername = "localhost";
$username = "u12893p9221_fgb";
$password = "FGBw8w";
$database = "u12893p9221_fgb.fgb_con";
// Create connection
$mysqli =  mysqli_connect($servername, $username, $password);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["vaname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["vaname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["vaemail"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["vaemail"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

   if (empty($_POST["vamessage"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["vamessage"]);
}

//$name = $_GET["vaname"];
//$email = $_GET["vaemail"];
//$comment = $_GET["vamessage"];
$to      = 'spam@oudgenoeg.nl';
$subject = 'mail the subject';
//$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $email, $comment, $headers);

$seperate = ",";
  echo "Hallo $name, een bericht is verstuurd";
  echo "<br>";
  echo "<br>";


$sql = "INSERT INTO ".$database." (con_name, con_mail, con_tekst)
VALUES ('".$name."', '".$email."', '".$comment."');";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


mysqli_close($mysqli);

}
function test_input($data) {
	global $mysqli;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = $mysqli->real_escape_string($data);
  return $data;
}

 ?>
<meta http-equiv="refresh" content="1; url=http://erwin.oudgenoeg.nl">

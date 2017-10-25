<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

   if (empty($_POST["message"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["message"]);
  }

$name = $_GET["vaname"];
$email = $_GET["vaemail"];
$comment = $_GET["vamessage"];
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

  $myfile = fopen("../../private_html/erwin/doc/usercom.txt", "a") or die("Unable to open file!");
  fwrite($myfile, gmdate("Y m d h i s"));
  fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REQUEST_TIME']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REMOTE_ADDR']);
    fwrite($myfile, $seperate);
//    fwrite($myfile, $_SERVER['REMOTE_HOST']);
//    fwrite($myfile, $seperate);
    fwrite($myfile, $_SERVER['REMOTE_PORT']);
    fwrite($myfile, $seperate);
    fwrite($myfile, $name);
    fwrite($myfile, $seperate);
    fwrite($myfile, $email);
    fwrite($myfile, $seperate);
    fwrite($myfile, $comment);
    fwrite($myfile, "\n");
  fclose($myfile);
//  header('Location: http://erwin.oudgenoeg.nl/');
//  exit;
 ?>
 <meta http-equiv="refresh" content="1; url=http://erwin.oudgenoeg.nl">

<?php
if (substr(getcwd(), -3) == "php") {
  include "./dbvars.php";
  require_once("./certificate.class.php"); // load class of a certificate
} else {
  include "./php/dbvars.php";
  require_once("./php/certificate.class.php"); // load class of a certificate
}
/**
 * Class for creating a object with list of my certificates
 */
class CertificatesList # extends AnotherClass
{
  protected $certificates;

  function __construct() {
    global $conn;
    $this->certificates = array();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = ("SELECT certid, certname, certdate, certlink, company , img_name
            FROM certificates
            ORDER BY certdate")
            ;
    $result = $conn->query($sql);
    $i = 0;
    // fill array with items fom database
    while($row = $result->fetch_assoc() ) {
      $this->certificates[$i] =
        new Certificate($row['certid'], $row['certname'], $row['certdate'],
        $row['certlink'],  $row['company'], $row['img_name']);
      $i++;
    }
    // close database
    mysqli_close($conn);

  }

}
 ?>

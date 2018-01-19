<?php
if (substr(getcwd(), -3) == "php") {
  include "./dbvars.php";
} else {
  include "./php/dbvars.php";
}
/**
 * Class for creating a object with list of my certificates
 */
class Certificate # extends AnotherClass
{
  protected $certid;
  protected $certname;
  protected $certdate;
  protected $certlink;
  protected $company;
  protected $img_name;

  function __construct($certid, $certname, $certdate, $certlink, $company, $img_name) {
    global $conn;
    $this->certid = $certid;
    $this->certname = $certname;
    $this->certdate = $certdate;
    $this->certlink = $certlink;
    $this->company = $company;
    $this->img_name = $img_name;
  }
  function certname() {
    return $this->certname;
  }

}
 ?>

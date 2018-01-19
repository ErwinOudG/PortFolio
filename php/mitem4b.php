<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
require_once("./funclib.php");
require_once("./certificateslist.class.php"); // load class of my list of certificates

if (!isset($_SESSION["suc6"])) {
$_SESSION["Err"] = "";
$_SESSION["suc6"] = "";
$_SESSION["namekeep"] = "";
$_SESSION["mailkeep"] = "";
}
echo "Mijn certificaten";
// $mycert = new CertificatesList();

?>
<div class="container">
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header" active><i class="material-icons">filter_drama</i>First</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul>
</div>

<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
if (!isset($_SESSION["suc6"])) {
$_SESSION["Err"] = "";
$_SESSION["suc6"] = "";
$_SESSION["namekeep"] = "";
$_SESSION["mailkeep"] = "";
}
// if (!isset($_SESSION["nameErr"]) && !isset($_SESSION["Err1"]) && !isset($_SESSION["nameErr"])) {
  console_log($_SESSION["namekeep"]);
//   $_SESSION["namekeep"] = "";
// }
?>
<!DOCTYPE html>
<!-- Portfolio voor codegorilla -->
<!-- Portfolio van en door Erwin Oudgenoeg  -->
<!-- copyrights  E.A. Oudgenoeg-->

<div class="ww">
  <p><span class="error">* required field.</span></p>
  <form action="./php/ww_action.php" method="post">
    <input name="username" type="text" autofocus  title="Mag alleen uit karakters en spaties bestaan" placeholder="Uw naam.." value="<?php echo  $_SESSION["namekeep"];?>">
    <span class="error">*</span><br/>
    <input name="emailaddr" type="text"  title="naam@voorbeeld.nl" placeholder="Uw E-mail adres.." value="<?php echo  $_SESSION["mailkeep"];?>">
    <span class="error">*</span><br/>
    <input name="userpw1" type="password" placeholder="Uw wachtwoord.." >
    <span class="error">*</span><br/>
    <input name="userpw2" type="password" placeholder="herhaal Uw wachtwoord.." >
    <span class="error">*</span><br/>
    <input class="cl_submit" type="submit" value="Verstuur" />
    <span hidden>*</span>
  </form>
  <?php
  if (isset($_SESSION["Err"])) {
    echo "<br><span class='error'> ";
    echo $_SESSION["Err"];
    echo "</span>";
  }
  if (isset($_SESSION["suc6"])) {
    echo "<br>";
    echo $_SESSION["suc6"];
  }
  ?>
</div>

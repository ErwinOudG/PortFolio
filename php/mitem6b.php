<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
require_once("./funclib.php");

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
<!-- form met materialize -->
<div class="container">Gebruikers registratie
  <div class="row">
    <form class="col s12" action="./php/ww_action.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input name="username" id="username" type="text" autofocus  title="Mag alleen uit karakters en spaties bestaan" placeholder="Uw naam.." value="<?php echo  $_SESSION["namekeep"];?>">
          <label for="username">Naam</label>
        </div>
        <div class="input-field col s6">
          <input id="emailadress" name="emailaddr" type="text" title="naam@voorbeeld.nl" placeholder="Uw E-mail adres.." value="<?php echo  $_SESSION["mailkeep"];?>">
          <label for="emailadress">Email Adres</label>
        </div>
        <div class="input-field col s6">
          <input id="pw1" name="userpw1" type="password" placeholder="Uw wachtwoord.." >
          <label for="pw1">Password</label>
        </div>
        <div class="input-field col s6">
          <input id="pw2" name="userpw2" type="password" placeholder="herhaal Uw wachtwoord.." >
          <label for="pw2">Herhaal Password</label>
        </div>
        <button class="waves-effect waves-light btn" ><input type="submit" value="Verstuur" /><i class="material-icons right">send</i></button>
      </div>
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
</div>

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
echo "menu item 5";
?>
</div>

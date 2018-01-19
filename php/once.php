<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
$_SESSION  = array();
$_SESSION["hits"] = 0;
$_SESSION["Err"] = "";
$_SESSION["suc6"] = "";
$_SESSION["namekeep"] = "";
$_SESSION["mailkeep"] = "";
?>

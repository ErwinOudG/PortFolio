<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
require_once("./php/funclib.php");
require_once("./php/topmenu.class.php");

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$topmenu = new TopMenu();
console_log($topmenu->createMenu());
echo $topmenu->createMenu();



?>

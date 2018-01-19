<?php
include_once("topmenu.class.php");
$topmenu = new TopMenu(); // create topmenu object

echo json_encode($topmenu);
?>

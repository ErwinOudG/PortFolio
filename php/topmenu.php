<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
require_once("./php/funclib.php");

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
include "./php/dbvars.php";
$ar_menuitemname = array();
// Create connection
$conn =  mysqli_connect($servername, $dbusername, $dbpassword);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = ("SELECT itemname, itemid
        FROM $dbmenuitem
        WHERE menuid = 2
        ORDER BY itemorder")
        ;
$result = $conn->query($sql);
console_log($result);
echo '<br>';
$i = 0;
// fill array with items fom database
while( $row = $result->fetch_assoc() ) {
  $ar_menuitemname[$i] = $row['itemname'];
  $ar_itemnum[$i] = $row['itemid'];
  $i++;
}
// close database
mysqli_close($conn);


echo '<nav id="topmenu" class="cl_topmenu cl_centre"><ul class="cl_topmenu">';

// generate menu from Array
$arrlength=count($ar_menuitemname);
if ($arrlength>0) {
    for($x=0;$x<$arrlength;$x++)
    {
        echo '<li><a href="#id'.$ar_itemnum[$x].'">'.$ar_menuitemname[$x].'</a></li>';
    }
    echo '</ul></nav>';
// generate div's from array
    for($x=0;$x<$arrlength;$x++)
    {
      // $menucontent = "&lt?php include('pw.php'); ?&gt";
        echo '<div id="id'.$ar_itemnum[$x]. '" class="cl_title_mid">';
        echo $ar_menuitemname[$x];
        echo '<br><p class="cl_centre">';
        echo 'Erwin '.$ar_menuitemname[$x];
        echo '</p><br>';
        $filetest = "./php/mitem$ar_itemnum[$x].php";
        // $filetest = "./php/$ar_menuitemname[$x].php";
        console_log($filetest);
        echo '<br>';
        if (file_exists($filetest)) {
          echo '<br><p>';
          include($filetest);
          echo '</p><br>';
        }
        echo '</div>';
    }
}
else {
    echo "geen menu items gevonden";
}

?>

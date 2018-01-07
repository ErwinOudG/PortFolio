<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
include "../../private_html/dev/php_files/dbvars.php";
$ar_menuitemname = array();
// Create connection
$conn =  mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = ("SELECT menu_item_name
        FROM u12893p9221_fgb.fgb_menu_items
        WHERE menu_name = 'Top'
        ORDER BY menu_order")
        ;
$result = $conn->query($sql);

// fill array with items fom database
while( $row = $result->fetch_assoc() ) {
    foreach( $row  AS $value ) {
        $ar_menuitemname[] = $value;
    }
}
// close database
mysqli_close($conn);


echo '<nav class="cl_topmenu cl_centre"><ul class="cl_topmenu">';

// generate menu from Array
$arrlength=count($ar_menuitemname);
if ($arrlength>0) {
    for($x=0;$x<$arrlength;$x++)
    {
        echo '<li><a href="#id'.$ar_menuitemname[$x].'">'.$ar_menuitemname[$x].'</a></li>';
    }
    echo '</ul></nav>';
// generate div's from array
    for($x=0;$x<$arrlength;$x++)
    {
        echo '<div id="id'.$ar_menuitemname[$x]. '" class="cl_title_mid">'.$ar_menuitemname[$x].'<br><p class="cl_centre">Erwin '.$ar_menuitemname[$x].'</p><br></div>';
    }
}
else {
    echo "geen menu items gevonden";
}

?>

<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
echo "1";
include "../../private_html/dev/php_files/dbvars.php";
echo "2";
$ar_menuitemname = array();
echo "3";
// Create connection
$conn =  mysqli_connect($servername, $username, $password);
echo "4";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "5";

$sql = ("SELECT menu_item_name
        FROM u12893p9221_fgb.fgb_menu_items
        WHERE menu_name = 'Top'
        ORDER BY menu_order")
        ;
        echo "6";
$result = $conn->query($sql);
echo "7";
$ar_menuitemname = mysqli_fetch_all($result,MYSQLI_ASSOC);
// var_dump( $ar_menuitemname );
echo "8";

echo '<nav class="cl_topmenu cl_centre"><ul class="cl_topmenu">';
$arrlength=count($ar_menuitemname);
// echo .$arrlength.;
if ($arrlength>0) {
    foreach($ar_menuitemname as $menu_item_name => $menu_tag){
        echo '<li><a href="#'.$menu_tag.'">'.$menu_tag.'</a></li>';
    }

    // for($x=0;$x<$arrlength;$x++)
    // {
    //     $strTXT = $ar_menuitemname[$x];
    //     echo '<li><a href="#id'.$strTXT.'">'.$strTXT.'</a></li>';
    // }
    echo '</ul></nav>';
    for($x=0;$x<$arrlength;$x++)
    {
        echo '<div id="id'.$ar_menuitemname[$x]. '" class="cl_title_mid">'.$ar_menuitemname[$x].'<br><p class="cl_centre">Erwin '.$ar_menuitemname[$x].'</p><br></div>';
    }
}
else {
    echo "geen menu items gevonden";
}
  mysqli_close($conn);

?>

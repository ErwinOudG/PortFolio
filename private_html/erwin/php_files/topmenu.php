<?php
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
$ar_menuitemname = mysqli_fetch_all($result,MYSQLI_NUM);
// if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
        // $ar_menuitemname = array('.$row[menu_item_name].');
        // echo ".$row[menu_item_name].";
    // }
// } else {
    // echo "0 results";
// }
// $sql = "INSERT INTO ".$database." (log_time, log_ipaddr, log_port, log_subd)
// VALUES ('".$gm_date."', '".$s_remaddr."', '".$s_remport."', '".$subdomainname."');";
//
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }


// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
// echo '<li><a href="#id'.$row[menu_item_name].'">'.$row[menu_item_name].'</a></li>';
//
// $ar_menu_top = array("Home"=>"id_tag1",
//                      "POP"=>"id_tag2",
//                      "CV"=>"id_tag3",
//                      "Certificaten"=>"id_tag4",
//                      "Over"=>"id_tag5",
//                      "Contact"=>"id_tag6");
//
echo '<nav class="cl_topmenu cl_centre"><ul class="cl_topmenu">';
$arrlength=count($ar_menuitemname);
if ($arrlength>0) {
    for($x=0;$x<$arrlength;$x++)
    {
        echo '<li><a href="#id'.$ar_menuitemname[$x].'">'.$ar_menuitemname[$x].'</a></li>';
    }
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
// foreach($ar_menu_top as $menu_name => $menu_tag){
    // echo '<br><p class="cl_centre">Erwin '.$menu_name.'</p><br>';

// }
?>

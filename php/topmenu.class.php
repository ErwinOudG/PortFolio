<?php
if (substr(getcwd(), -3) == "php") {
  include "./dbvars.php";
} else {
  include "./php/dbvars.php";
}
/**
 * Class for creating a menu
 */
class TopMenu implements JsonSerializable # extends AnotherClass
{
  protected $ar_menuitemname;
  protected $ar_itemnum;

  function __construct() {
    global $conn;
    $this->ar_itemnum = array();
    $this->ar_menuitemname = array();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = ("SELECT itemname, itemid
            FROM menuitems
            WHERE menuitems.menuid = (SELECT menu.menuid from menu WHERE menuname = 'Top')
            ORDER BY itemorder")
            ;
    $result = $conn->query($sql);
    $i = 0;
    // fill array with items fom database
    while($row = $result->fetch_assoc() ) {
      $this->ar_menuitemname[$i] = $row['itemname'];
      $this->ar_itemnum[$i] = $row['itemid'];
      $i++;
    }
    // close database
    mysqli_close($conn);

  }

  function menuItemName() {
    return $this->ar_menuitemname;
  }

  function itemNumber() {
    return $this->ar_itemnum;
  }
  function itemNumberJSON() {
    return json_encode($this->ar_itemnum);
  }

  function jsonmenu() {
    $jsonmenu = "[]";
  }

  function createMenu() {

    echo "<script>var topmenu =".$this->itemNumberJSON().";</script>";

    // generate menu from Array
    $arrlength=count($this->ar_menuitemname);
    if ($arrlength>0) {
      echo '<nav id="topmenu" class="tm_topmenu tm_centre"><ul class="tm_topmenu">';
      // echo '<nav id="topmenu" class="tm_topmenu tm_centre"><ul class="tm_topmenu">';
      for($x=0;$x<$arrlength;$x++) {
        echo '<li><a href="#id'.$this->ar_itemnum[$x].'">'.$this->ar_menuitemname[$x].'</a></li>';
      }
      echo '</ul></nav><br>';
      // generate div's from array
      for($x=0;$x<$arrlength;$x++) {
        echo '<div id="id'.$this->ar_itemnum[$x]. '" class="tm_title_mid">';
        echo $this->ar_menuitemname[$x];
        echo '</div><br>';
        }
    } else {echo "geen menu items gevonden";}
    // return $result;
  }

  function help(){
  }
  public function jsonSerialize() {
    return [
      'itemname' => $this->ar_menuitemname,
      'itemnum' => $this->ar_itemnum
    ];
  }

}
 ?>

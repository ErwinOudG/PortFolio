<?php
include "./php/dbvars.php";
/**
 * Class for creating a menu
 */
class TopMenu # extends AnotherClass
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

  function createMenu() {

    // generate menu from Array
    $arrlength=count($this->ar_menuitemname);
    if ($arrlength>0) {
      echo '<nav id="topmenu" class="cl_topmenu cl_centre"><ul class="cl_topmenu">';
      for($x=0;$x<$arrlength;$x++) {
        echo '<li><a href="#id'.$this->ar_itemnum[$x].'">'.$this->ar_menuitemname[$x].'</a></li>';
      }
      echo '</ul></nav>';
      // generate div's from array
      for($x=0;$x<$arrlength;$x++) {
        // $menucontent = "&lt?php include('pw.php'); ?&gt";
        echo '<div id="id'.$this->ar_itemnum[$x]. '" class="cl_title_mid">';
        echo $this->ar_menuitemname[$x];
        echo '<br><p class="cl_centre">';
        echo 'Erwin '.$this->ar_menuitemname[$x];
        echo '</p><br>';
        $filetest = "./php/mitem".$this->ar_itemnum[$x].".php";
        echo '<br>';
        if (file_exists($filetest)) {
          echo '<br><p>';
          // echo '&lt?php include('.$filetest.'); ?&gt';
          include($filetest);
          echo '</p><br>';
        }
        echo '</div>';
        }
    } else {echo "geen menu items gevonden";}
    // return $result;
  }

  function help(){
  }
}
 ?>

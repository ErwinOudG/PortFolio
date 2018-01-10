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
    $result = '<nav id="topmenu" class="cl_topmenu cl_centre"><ul class="cl_topmenu">';

    // generate menu from Array
    $arrlength=count($this->ar_menuitemname);
    if ($arrlength>0) {
        for($x=0;$x<$arrlength;$x++)
        {
            $result .= '<li><a href="#id'.$this->ar_itemnum[$x].'">'.$this->ar_menuitemname[$x].'</a></li>';
        }
        $result .= '</ul></nav>';
    // generate div's from array
        for($x=0;$x<$arrlength;$x++) {
          // $menucontent = "&lt?php include('pw.php'); ?&gt";
            $result .= '<div id="id'.$this->ar_itemnum[$x]. '" class="cl_title_mid">';
            $result .= $this->ar_menuitemname[$x];
            $result .= '<br><p class="cl_centre">';
            $result .= 'Erwin '.$this->ar_menuitemname[$x];
            $result .= '</p><br>';
            $filetest = "./php/mitem".$this->ar_itemnum[$x].".php";
            $result .= '<br>';
            if (file_exists($filetest)) {
              $result .= '<br><p>';
              $result .= '<?php include('.$filetest.'); ?>';
              // $result .= 'include('.$filetest.');';
              $result .= '</p><br>';
            }
            $result .= '</div>';
        }
    }
    else {
        $result = "geen menu items gevonden";
    }
    return $result;
  }

  function help(){
  }
}
 ?>

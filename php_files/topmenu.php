<?php
$ar_menu_top = array("Home"=>"#id_tag1", "Ben"=>"37", "Joe"=>"43");
foreach($dataSet['abridged_cast'] as $castMember){
    echo '<li>'.$castMember['name'].'-'.implode(', ', $castMember['characters']). '</li>';
}
?>

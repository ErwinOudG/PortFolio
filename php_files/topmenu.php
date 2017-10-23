<?php
$ar_menu_top = array("Home"=>"#id_tag1", "POP"=>"#id_tag2", "CV"=>"#id_tag3");
foreach($ar_menu_top as $menu_name => $menu_tag){
//    echo '<li>'.$menu_name['name'].'-'.implode(', ', $castMember['characters']). '</li>';
    echo '<li class="cl_litopmenu"><a href="'.$menu_tag.'">'.$menu_name.'</a></li>';
}
?>

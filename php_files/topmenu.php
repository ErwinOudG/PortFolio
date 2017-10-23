<?php
$ar_menu_top = array("Home"=>"id_tag1",
                     "POP"=>"id_tag2",
                     "CV"=>"id_tag3",
                     "Certificaten"=>"id_tag4",
                     "Over"=>"id_tag5",
                     "Contact"=>"id_tag6");

echo '<nav class="cl_topmenu cl_centre"><ul class="cl_topmenu">';
foreach($ar_menu_top as $menu_name => $menu_tag){
//    echo '<li>'.$menu_name['name'].'-'.implode(', ', $castMember['characters']). '</li>';
    echo nl2br('<li><a href="#'.$menu_tag.'">'.$menu_name.'</a></li>');
};
echo '</ul></nav>';
foreach($ar_menu_top as $menu_name => $menu_tag){
//    echo '<li>'.$menu_name['name'].'-'.implode(', ', $castMember['characters']). '</li>';
    echo nl2br('<div id="'.$menu_tag. '" class="cl_title_mid">'.$menu_name.'</div>\n');
};
?>

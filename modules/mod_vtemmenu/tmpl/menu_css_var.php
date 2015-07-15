<?php
/**
* @Copyright Copyright (C) 2010 VTEM . All rights reserved.
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @link     	http://www.vtem.net
**/

$background = $params->get('background', '#ddd');
$textcolor = $params->get('textcolor', '#555');
$sub_background = $params->get('sub_background', '#eee');
$sub_textcolor = $params->get('sub_textcolor', '#555');
$sub_width = $params->get('sub_width', '220');
$hovertextcolor = $params->get('hovertextcolor', '#222');
?>
<style type="text/css">
ul.vt_menu li,div.vt_menu_wapper,ul.vt_menu{
background: <?php echo $background;?> left top repeat-x;
}
ul.vt_menu li a,ul.vt_menu li a:link,ul.vt_menu li a:visited{
color:<?php echo $textcolor;?>;
}
ul.vt_menu li a:hover,ul.vt_menu li ul.vt_menu_sub li a:hover,ul.vt_menu li.active a{color:<?php echo $hovertextcolor;?> !important;}
ul.vt_menu div.vt_nav,ul.vt_menu div.vt_nav ul.vt_menu_sub,ul.vt_menu div.vt_nav ul.vt_menu_sub li{
background-color: <?php echo $sub_background;?>;
}
ul.vt_menu div.vt_nav{_background:none;}
div.vt_nav li a,div.vt_nav li a:link,div.vt_nav li a:visited,.vtemmenu_mod h3,.vtemmenu_mod{
color: <?php echo $sub_textcolor;?> !important;
}
div.vt_nav ul.vt_menu_sub,div.vt_nav ul.vt_menu_sub li,ul.vt_menu_sub li ul.vt_menu_sub li{
width:<?php echo $sub_width;?>px;
}
ul.vt_menu li div.vt_nav div.vt_nav{
margin-left:<?php echo $sub_width+1;?>px;
}
ul.vt_menu div.cols2 ul.vt_menu_sub{
width : <?php echo ($sub_width*2)+20;?>px;
}
ul.vt_menu div.cols3 ul.vt_menu_sub{
width : <?php echo ($sub_width*3)+30;?>px;
}
ul.vt_menu div.cols4 ul.vt_menu_sub{
width : <?php echo ($sub_width*4)+40;?>px;
}
</style>

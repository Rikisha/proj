<?php
/**
* @Copyright Copyright (C) 2010 VTEM . All rights reserved.
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @link     	http://www.vtem.net
**/
// no direct access
defined('_JEXEC') or die('Restricted access');
include_once "menu_css_var.php";
?>
<div class="vt_menu_wapper" id="<?php echo $params->get('menuid','vt_menu'); ?>">
	<ul class="vt_menu<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php 
			$user = & JFactory::getUser();
			$zindex = 12000;
			foreach ($items as $i => &$row)		{
				if ($row->access <= $user->get('aid', 0)) {
					if ($row->content) {
						echo '<li class="'.$row->classe.' level'.$row->sublevel.'">'.$row->content;
					}
					elseif (isset($row->colonne)) {
						echo '</ul><div class="clr"></div></div><div class="vt_menu_sub"><ul class="vt_menu_sub">';
					}
					elseif ($row->name != "") {
						echo '<li class="'.$row->classe.' level'.$row->sublevel.'" style="z-index : '.$zindex.';">';
								switch ($row->type) :
									default:
									case 'separator':
										echo $row->image_lft.'<span class="vt_title">'.$row->name.'</span>'.$row->image_rgt;
										break;
									case 'url':
									case 'component':
										switch ($row->browserNav) :
											default:
											case 0:
												echo '<a href="'.$row->link.'">'.$row->image_lft.'<span class="vt_title">'.$row->name.'</span></a>'.$row->image_rgt;
												break;
											case 1:
												// _blank
												echo $row->image_lft.'<a href="'.$row->link.'" target="_blank"><span class="vt_title">'.$row->name.'</span></a>'.$row->image_rgt;
												break;
											case 2:
												echo $row->image_lft.'<a href="'.$row->link.'&tmpl=component" onclick="window.open(this.href,\'targetWindow\',\'$attribs\');return false;"><span class="vt_title">'.$row->name.'</span></a>'.$row->image_rgt;			
												break;
										endswitch;
										break;
								endswitch;
					}
				}
					
					if ($row->deeper)
					{	
						echo "\n\t<div class=\"vt_nav".$row->divclasse."\"><div class=\"vt_menu_sub\">\n\t<ul class=\"vt_menu_sub\">";
					}
					// The next item is shallower.
					elseif ($row->shallower)
					{
						echo "\n\t</li>";
						
						echo str_repeat("\n\t</ul>\n\t<div class=\"clr\"></div></div><div class=\"clr\"></div></div>\n\t</li>", $row->level_diff);
					}
					// the item is the last.
					elseif ($row->is_end)
					{			
						echo str_repeat("</li>\n\t</ul>\n\t<div class=\"clr\"></div></div></div>", $row->level_diff);
						echo "</li>";
					}
					// The next item is on the same level.
					else {
						if (!isset($row->colonne)) echo "\n\t\t</li>\n";
					}
				
				$zindex--;
			}
		?>
	</ul>
<div style="clear:both;"></div>
</div>


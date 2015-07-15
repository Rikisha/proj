<?php
/**
* @Copyright Copyright (C) 2010 VTEM . All rights reserved.
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @link     	http://www.vtem.net
**/
// no direct access
defined('_JEXEC') or die('Restricted access');

class modvtemmenuHelper {

    function GetMenu(&$params) {
        jimport('joomla.application.module.helper');


        $mooduree = $params->get('mooduration', 500);
        $mootransition = $params->get('mootransition', 'Bounce');
        $mooease = $params->get('mooease', 'easeOut');
        $usemootools = $params->get('usemootools', '1');
        $usecss = $params->get('usecss', '1');
        $menuID = $params->get('menuid', 'vt_menu');


        $document = &JFactory::getDocument();
		if($usecss == 1){
        $document->addStyleSheet(JURI::base() . 'modules/mod_vtemmenu/style.css');
		}

        if ($usemootools == 1) {
            JHTML::_("behavior.mootools");
            $document->addScript(JURI::base() . 'modules/mod_vtemmenu/moo_vtemmenu.js');

            $js = "window.addEvent('domready', function() {new DropdownVtemmenu(\$E('div#" . $menuID . "'),{"
                    . "mooTransition : '" . $mootransition . "',"
                    . "mooEase : '" . $mooease . "',"
                    . "mooDuree : " . $mooduree . "});"
                    . "});";

            $document->addScriptDeclaration($js);
        } else {
            $script = 'window.addEvent(\'domready\', function() {
                        var sfEls = document.getElementById("' . $menuID . '").getElementsByTagName("li");
                        for (var i=0; i<sfEls.length; i++) {
	
                            sfEls[i].onmouseover=function() {
                                this.className+=" sfhover";
                            }
		
                            sfEls[i].onmouseout=function() {
                                this.className=this.className.replace(new RegExp(" sfhover\\\\b"), "");
                            }
                        }
                        });';
            $document->addScriptDeclaration($script);
        }
    
        $menutype = $params->get('menutype', 'mainmenu');
        $db = & JFactory::getDBO();
        $query = "
			SELECT *
			FROM #__menu
			WHERE menutype='" . $menutype . "' AND published=1
			ORDER BY sublevel DESC,ordering
			;";
        $db->setQuery($query);
        $rows = $db->loadObjectList('id');

        $user = & JFactory::getUser();
        $urights = $user->get('aid', 0);

        $menu = &JSite::getMenu();
        $active = $menu->getActive();

        $modulesList = modvtemmenuHelper::CreateModulesList();

        $level = 0;
        $items = array();
        $i = 0;


        foreach ($rows as $item) {
            if ($item->sublevel > 0) {
                $rows[$item->parent]->haschild = 'yes';
                if (isset($item->haschild)) {
                    $rows[$item->parent]->enfants.=$item->id . '|' . $item->enfants;
                } else {
                    $rows[$item->parent]->enfants.=$item->id . '|';
                }


               if (isset($active) && $active->id == $item->id) {


                    $j = $item->sublevel;

                    $tempitemID = $item->parent;

                    while ($j != 0) {

                        $rows[$tempitemID]->classe .= " active";

                        $tempitemID = $rows[$tempitemID]->parent;

                        $j--;
                    }
                }
                if (isset($item->haschild)) {
                    $item->classe .= " parent";
                }
            }
            if ($item->sublevel == 0 && $urights >= $item->access) { 
                $items[$i] = $item;
                if (isset($item->haschild)) {
                    $item->classe .= " parent";
                    $childs = explode("|", $item->enfants);
                    foreach ($childs as $c) {
                        if ($c) {
                            $i++;

                            if (($urights >= $rows[$rows[$c]->parent]->access) && ($urights >= $rows[$c]->access)) {
                                $items[$i] = $rows[$c];
                            } else {
                                $i--;
                            }
                        }
                    }
                }
            } else {
                $i--;
            }
            $i++;
        }



        foreach ($items as $i => &$item) {
            $item->deeper = (isset($items[$i + 1]) && ($item->sublevel < $items[$i + 1]->sublevel));
            $item->shallower = (isset($items[$i + 1]) && ($item->sublevel > $items[$i + 1]->sublevel));
            $item->level_diff = (isset($items[$i + 1])) ? ($item->sublevel - $items[$i + 1]->sublevel) : $item->sublevel;
            $item->is_end = !isset($items[$i + 1]);

            $menu_params = new stdClass();
            $menu_params = new JParameter($item->params);
            $menu_secure = $menu_params->def('secure', 0);

            switch ($item->type) {
                case 'separator':
                    continue;

                case 'url':
                    if ((strpos($item->link, 'index.php?') === 0) && (strpos($item->link, 'Itemid=') === false)) {
                        $item->link = $tmp->link . '&amp;Itemid=' . $item->id;
                    }
                    break;
                case 'alias':
                    $item->link = 'index.php?Itemid=' . $item->params->aliasoptions;

                    break;
                default:
                    $router = JSite::getRouter();
                    if ($router->getMode() == JROUTER_MODE_SEF) {
                        $item->link = 'index.php?Itemid=' . $item->id;
                    } else {
                        $item->link .= '&Itemid=' . $item->id;
                    }
                    break;
            }

            if ($item->home == 1) {
                $item->link = JURI::base();
            } elseif (strcasecmp(substr($item->link, 0, 4), 'http') && (strpos($item->link, 'index.php?') !== false)) {
                $item->link = JRoute::_($item->link, true, $menu_secure);
            } else {
                $item->link = str_replace('&', '&amp;', $item->link);
            }

             $item->classe .= " item" . $item->id;
            if (isset($active) && $active->id == $item->id) {
                $item->classe .= " current active";
            }

            if (preg_match('/\[col\]/', $item->name)) {
                $item->colonne = true;
                $item->name = '';
            }
            $item->divclasse = "";
            if (preg_match('/\[cols(.+)\]/', $item->name, $resultat)) {
                $item->name = preg_replace('/\[cols(.+)\]/', '', $item->name);
                $divclasse = " cols" . $resultat[1];
                $item->divclasse = strval($divclasse);
            }


            $paramsVT = "";
            $masque = "#\[(.+)\]#";
            if (preg_match($masque, $item->name, $resultat)) {
                $paramsVT = $resultat[1];
                $titleVT = preg_replace('/\[' . $resultat[1] . '\]/', '', $item->name);
            } else {
                $titleVT = $item->name;
            }


            if (preg_match('/modname/', $paramsVT)) {
                $item->content = '<div class="vtemmenu_mod">' . modvtemmenuHelper::GenModuleByName($paramsVT, $params) . '<div class="clr"></div></div>';
            } elseif (preg_match('/modid/', $paramsVT)) {
                $item->content = '<div class="vtemmenu_mod">' . modvtemmenuHelper::GenModuleById($paramsVT, $params, $modulesList) . '<div class="clr"></div></div>';
            } else {
                $item->content = "";
            }

           $titleVT = explode("||", $titleVT);
            if (isset($titleVT[1])) {
                $titleVT = $titleVT[0] . '<br/><span class="vt_desc">' . $titleVT[1] . '</span>';
            } else {
                $titleVT = $titleVT[0];
            }


            $menu_image = $menu_params->def('menu_image', -1);
            $item->image_lft = "";
            $item->image_rgt = "";
            if (($menu_image <> '-1') && $menu_image) {
                $image = '<img src="' . JURI::base(true) . '/images/stories/' . $menu_image . '" border="0" alt="' . $item->name . '"/>';
                if ($params->get('menu_images_align')) {
                    $item->image_rgt = $image;
                } else {
                    $item->image_lft = $image;
                }
            }


            $item->name = $titleVT;
        }



        return $items;
    }

    function GenModuleByName($paramsVT, &$params) {
        $paramsVT = preg_replace('/modname=/', '', $paramsVT);
        if (JModuleHelper::isEnabled($paramsVT)) {
            $module = JModuleHelper::getModule($paramsVT);
            $attribs['style'] = 'xhtml';
            return JModuleHelper::renderModule($module, $attribs);
        }
    }

    function GenModuleById($paramsVT, &$params, &$modulesList) {
        $paramsVT = preg_replace('/modid=/', '', $paramsVT);
        $modtitle = $modulesList[$paramsVT]->title;
        $modname = $modulesList[$paramsVT]->module;
        $modname = preg_replace('/mod_/', '', $modname);

        if (JModuleHelper::isEnabled($modname)) {
            $module = JModuleHelper::getModule($modname, $modtitle);
               $attribs['style'] = 'xhtml';
            return JModuleHelper::renderModule($module, $attribs);
        }
    }

    function CreateModulesList() {
        $db = & JFactory::getDBO();
        $query = "
			SELECT *
			FROM #__modules
			WHERE published=1
			ORDER BY id
			;";
        $db->setQuery($query);
        $modulesList = $db->loadObjectList('id');
        return $modulesList;
    }

}
?>
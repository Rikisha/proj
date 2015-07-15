<?php
/**
 * @copyright	Copyright (C) 2013 Jolanta Surma All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

class plgSystemInfo_ciacho extends JPlugin
{

	function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);

		$app = JFactory::getApplication();
		if ($app->isAdmin()) {
			return;
		}
		$info_cookie = JRequest::getVar('info_cookie', 0, 'COOKIE');
		if($info_cookie ) return;
		setcookie('info_test',1);
	}

  public function onAfterDispatch()
  {
  	
	  $app = JFactory::getApplication();
		if ($app->isAdmin()) {
			return;
		}
		$info_cookie = JRequest::getVar('info_cookie', 0, 'COOKIE');
		if($info_cookie ) return;
	
	  $styl = $this->params->get('wybierz_styl', 'style');
	  JHtml::stylesheet(JURI::base().'/media/plg_system_info_ciacho/css/'.$styl.'.css', false, true, false);
	  $startuj = $this->params->get('startuj', 0);
	  
    $styl_id = 'panel_cookie_dol';
    if($startuj) 
        $styl_id = 'panel_cookie';
            
	  $ile_dni = $this->params->get('ile_dni', 0);
	  	  if($ile_dni){
    	  JFactory::getDocument()->addScriptDeclaration("
              function info_cookie(){
                 var exdays = ".$ile_dni.";
                 var exdate=new Date();
                 exdate.setDate(exdate.getDate() + exdays);
                 document.cookie = 'info_cookie=1;expires='+exdate.toUTCString();
                 document.getElementById('".$styl_id."').style.display='none';             
              }
              window.addEvent('load', function() {
                var cookies = document.cookie.split(';');
                if(!cookies.length)
                  document.getElementById('".$styl_id."').style.display='none'; 
               });
         ");
    }
    else{
        JFactory::getDocument()->addScriptDeclaration("
              function info_cookie(){
                 document.cookie = 'info_cookie=1';
                 document.getElementById('".$styl_id."').style.display='none';             
              }
              window.addEvent('load', function() {
                var cookies = document.cookie.split(';');
                if(!cookies.length)
                  document.getElementById('".$styl_id."').style.display='none'; 
               });
         ");
    
    }	  
	}
	  
  	public function onAfterRender() {
  	
        $app = JFactory::getApplication();
        if ($app->isAdmin()) {
    			return;
    		}
    		 $info_cookie = JRequest::getVar('info_cookie', 0, 'COOKIE');
    		 
    		 if($info_cookie ) return;
    		 
    		 $lang = JFactory::getLanguage();
	       $lang->load('plg_system_info_ciacho', JPATH_ADMINISTRATOR, null, 1);
	  
    		 $startuj = $this->params->get('startuj', 0);
    		 $id_art = $this->params->get('id_art', '');
    		 $itemid_art = $this->params->get('itemid_art', '');
         $buffer = JResponse::getBody();
         
          $czytaj_wiecej = ''; 
          if($id_art){
          
            $Itemid = '';
            if ($itemid_art) 
        		   $Itemid = '&amp;Itemid='. $itemid_art;

            $link = 'index.php?option=com_content&amp;view=article&amp;id='. $id_art.$Itemid;  
            $link = JRoute::_($link);
  		      $czytaj_wiecej = '<a href="'.$link.'">'.JText::_('CZYTAJ_WIECEJ').'...</a>';		  
          }
          
          $styl_id = 'panel_cookie_dol';
          if($startuj) 
              $styl_id = 'panel_cookie';
        
          $tresc = sprintf(JText::_('INFO_CIACHO_INFO'), $czytaj_wiecej);
          
          $dodatek = '<div id="'.$styl_id.'" class="panel_cookie">'
                    .'<div class="tresc">'.$tresc.'</div><input type="button" id="ukryj" value="'.JText::_('UKRYJ').'" onclick="info_cookie();"/>'
                    .'</div>';              
  	      
  	      $dodane = $dodatek.'</body>';
  	      $buffer = str_replace('</body>', $dodane, $buffer);
  	      
  	  JResponse::setBody($buffer);
  	}
}
?>

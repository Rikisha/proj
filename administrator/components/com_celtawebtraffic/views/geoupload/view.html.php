<?php
defined('_JEXEC') or die('Restricted Access');

/**
 * @package             Joomla
 * @subpackage          CeltaWeb Traffic Component
 * @author              Steven Palmer
 * @author url          http://coalaweb.com
 * @author email        support@coalaweb.com
 * @license             GNU/GPL, see /files/en-GB.license.txt
 * @copyright           Copyright (c) 2013 Steven Palmer All rights reserved.
 *
 * CeltaWeb Traffic is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

jimport('joomla.application.component.view');

class CeltawebtrafficViewGeoupload extends JView
{

    public function display($tpl = null) {
		
        if($this->geodatExist('geoip')) {
            $mymod = $this->geodatMod('geoip'); 
                echo JText::sprintf('COM_CELTAWEBTRAFFIC_YESGEO_UPLOAD_MESSAGE', $mymod);
        }
        else {
            echo JText::_('COM_CELTAWEBTRAFFIC_NOGEO_UPLOAD_MESSAGE');
        }
        
        $this->setToolbar();
        $this->jsOptions['url'] = JURI::base();
        parent::display($tpl);
    }


    public function setToolbar()
    {
        $canDo = CeltawebtrafficHelper::getActions();
        JToolBarHelper::title(JText::_('COM_CELTAWEBTRAFFIC_TITLE_MAIN'). ' [ ' . JText::_( 'COM_CELTAWEBTRAFFIC_TITLE_GEO' ) . ' ]' , 'cwt-geo' );
        JToolBarHelper::back( 'COM_CELTAWEBTRAFFIC_TITLE_CPANEL', 'index.php?option=com_celtawebtraffic' );
        
        if ($canDo->get('core.admin')) 
        {
            if($this->filesExist('archives')) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('geoupload.unzip', 'cwt-extract', 'unzip', 'Unzip', false);
            }
        }
        if ($canDo->get('core.admin')) 
        {
            JToolBarHelper::divider();
            JToolBarHelper::preferences('com_celtawebtraffic');
        }
                		
        $help_url  = 'http://coalaweb.com/services/joomla-services-such-a-great-cms/joomla-docs/item/celtaweb-traffic-guide';
        JToolBarHelper::help( 'COM_CELTAWEBTRAFFIC_TITLE_HELP', false, $help_url );

    }

    /**
     * Checks if folder + files exist in the com_celtawebtraffic tmp path
     * @param $type
     * @return bool
     */
    private function filesExist($type) {
        $path = JFactory::getConfig()->get('tmp_path') . '/com_celtawebtraffic/'.$type;
        if(JFolder::exists($path)) {
            if(JFolder::folders($path, '.', false) || JFolder::files($path, '.', false)) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Checks if geolitecity.dat file exists
     * @param $geo
     * @return bool
     */
    private function geodatExist($geo) {
        if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
        $path = JPATH_COMPONENT_ADMINISTRATOR.DS.'assets'.DS.$geo;

        if(JFolder::files($path, 'geolitecity.dat', false)) {
            return true;
        }
        return false;
    }
    
    /**
     * Returns modified date for file
     * @param $geo
     * @return $mod
     */
    private function geodatMod($geo) {
            if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
            $path = $path = JPATH_COMPONENT_ADMINISTRATOR.DS.'assets'.DS.$geo;
            $mod =  date ("F d Y", filemtime($path.'/geolitecity.dat'));

            return $mod;
        }
        
    function curlInstalled() {
            if  (in_array  ('curl', get_loaded_extensions())) {
                return true;
            }
            else {
                return false;
            }
        }
}
<?php
defined('_JEXEC') or die('Restricted access');

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


class CeltawebtrafficViewControlpanel extends JView {

	function display($tpl = null) {
	
                $canDo = CeltawebtrafficHelper::getActions();
                $model = & $this->getModel(); 
                $countries  = & $model->getCountries();
                $cities = & $model->getCities();
                
                // Is this the Professional release?
		jimport('joomla.filesystem.file');
		$isPro = (COM_CELTAWEBTRAFFIC_PRO == 1);
		$this->assign('isPro', $isPro);

                $version = (COM_CELTAWEBTRAFFIC_VERSION);
                $this->assign('version', $version);
                
                $releaseDate = (COM_CELTAWEBTRAFFIC_DATE);
                $this->assign('release_date', $releaseDate);

                $this->assignRef('countries',	$countries);
                $this->assignRef('cities',	$cities);
                
                if(!$this->geodatExist('geoip')) {
                    echo JText::_('COM_CELTAWEBTRAFFIC_NOGEO_CPANEL_MESSAGE');
                }
                        
                JToolBarHelper::title(JText::_('COM_CELTAWEBTRAFFIC_TITLE_MAIN'). ' [ ' . JText::_( 'COM_CELTAWEBTRAFFIC_TITLE_CPANEL' ) . ' ]' , 'cwt-cpanel' );
                if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::preferences('com_celtawebtraffic');
		}
                		
                $help_url  = 'http://coalaweb.com/services/joomla-services-such-a-great-cms/joomla-docs/item/celtaweb-traffic-guide';
                JToolBarHelper::help( 'COM_CELTAWEBTRAFFIC_TITLE_HELP', false, $help_url );

		parent::display($tpl);
	}
        
        /**
         * Checks if geolitecity.dat file exists
         * @param $geo
         * @return bool
         */
        private function geodatExist($geo) {
            if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
            $path = JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_celtawebtraffic'.DS.'assets'.DS.$geo;

            if(JFolder::files($path, 'geolitecity.dat', false)) {
                return true;
            }
            return false;
        }
}

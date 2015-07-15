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
 
/**
 *  component helper.
 */
abstract class CeltawebtrafficHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
                JSubMenuHelper::addEntry(
                        JText::_('COM_CELTAWEBTRAFFIC_TITLE_CPANEL'), 
                        'index.php?option=com_celtawebtraffic&view=controlpanel', 
                        $submenu == 'controlpanel');
                JSubMenuHelper::addEntry(
                        JText::_('COM_CELTAWEBTRAFFIC_TITLE_VISITORS'), 
                        'index.php?option=com_celtawebtraffic&view=visitors', 
                        $submenu == 'visitors');
                JSubMenuHelper::addEntry(
                        JText::_('COM_CELTAWEBTRAFFIC_TITLE_KNOWNIPS'), 
                        'index.php?option=com_celtawebtraffic&view=knownips', 
                        $submenu == 'knownips');
                JSubMenuHelper::addEntry(
                        JText::_('COM_CELTAWEBTRAFFIC_TITLE_GEO'), 
                        'index.php?option=com_celtawebtraffic&view=geoupload', 
                        $submenu == 'geoupload');
	}
	/**
	 * Get the actions
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;
                $assetName = 'com_celtawebtraffic';
                
		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);
 
		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}
 
		return $result;
	}
        
        /**
	 * Update Visitor info to include country and city
	 */
        public static function location_update( ) {
            $db	= JFactory::getDbo();
            if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
            if (file_exists(JPATH_COMPONENT.DS.'assets'.DS.'geoip'.DS.'geolitecity.dat')){
                if (filesize(JPATH_COMPONENT.DS.'assets'.DS.'geoip'.DS.'geolitecity.dat')!=0){
                    if (!function_exists('GeoIP_record_by_addr')) {
                        include(JPATH_COMPONENT.DS.'assets'.DS.'geoip'.DS.'geoipcity.inc');
                    }
                    $geoip = geoip_open(JPATH_COMPONENT.DS.'assets'.DS.'geoip'.DS.'geolitecity.dat', GEOIP_STANDARD);

                    $query = $db->getQuery(true);
                    $query->select('id, ip');
                    $query->from($db->quoteName('#__cwtraffic'));
                    $query->where('country_code = "" OR country_code is null');
                    $db->setQuery($query);

                    foreach( $db->loadObjectList() as $row )
                    {
                            $country_code=strtolower(geoip_country_code_by_addr($geoip, $row->ip ));
                            $country_name=geoip_country_name_by_addr($geoip, $row->ip); 
                            $addr=GeoIP_record_by_addr($geoip, $row->ip);
                            if (!empty($addr)) {
                                    $city=$addr->city;
                            }
                            if($country_code!='' && $country_name!='' /*&& $city!=''*/){
                                
                              $query = $db->getQuery(true);
                              $query->update('#__cwtraffic');
                              $query->set('country_code = '.$db->quote($country_code));
                              $query->set('country_name = '.$db->quote($country_name));
                              $query->set('city = ' .$db->quote($city));
                              $query->where('id = ' .$row->id);
                              $db->setQuery($query);  
                              $db->query(); 
                              
                            }
                    }

                    geoip_close($geoip);

                    $query = $db->getQuery(true);
                    $query->update('#__cwtraffic');
                    $query->set('city = NULL');
                    $query->where('city = ""');
                    $db->setQuery($query);  
                    $db->query(); 

                    }
            }
            return;
        }
        
}
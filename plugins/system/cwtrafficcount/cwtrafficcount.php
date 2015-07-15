<?php
/**
 * @package             Joomla
 * @subpackage          CW Traffic Count Plugin
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

defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.plugin.plugin');

class plgSystemCwtrafficCount extends JPlugin {

	public function onAfterInitialise()
	{
           $this->countTraffic();
        }
    
        public function countTraffic()
	{
            $app = JFactory::getApplication();

            if ($app->isSite()) {
                
                $config   = JFactory::getConfig();
                $siteOffset = $config->getValue('config.offset');
                $dtnow = JFactory::getDate('now', $siteOffset);
                $componentParams = JComponentHelper::getParams('com_celtawebtraffic');
                $now = $dtnow->toUnix(true);

                $db	= JFactory::getDbo();

                $locktime       =       $componentParams->get('locktime', 60) * 60;
                $nobots         =       $componentParams->get('nobots');
                $botslist       =       $componentParams->get('botslist');
                $noip           =       $componentParams->get('noip');
                $ipslist        =       $componentParams->get('ipslist');		         

                if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
		// Keep out bots
		$bot = 0;
                
                if($nobots)
                {
                    $agent = $_SERVER['HTTP_USER_AGENT'];

                    if(!empty($agent))
                    {
                        $bots_array = array_map('trim', explode(',', $botslist));

                        foreach($bots_array as $bot_value)
                        {
                            if(preg_match('@'.$bot_value.'@i', $agent))
                            {
                                $bot = 1;
                                break;
                            }
                        }
                    }
                    else
                    {
                        $bot = 1;
                    }
                }
		
		// Lock out IP addresses
                $iplock = 0;
                if($noip)
                {
                    if(!empty($ip))
                    {
                        $ips_array = array_map('trim', explode(',', $ipslist));

                        foreach($ips_array as $ip_value)
                        {
                            if(preg_match('@'.$ip_value.'@i', $ip))
                            {
                                $iplock = 1;
                                break;
                            }
                        }
                    }
                    else
                    {
                        $iplock = 1;
                    }
                }
		
		
		// Check if IP already exists and reload lock expired
                
                $query = $db->getQuery(true);
                $query->select('count(*)');
                $query->from($db->quoteName('#__cwtraffic'));
                $query->where('ip = '. $db->quote($ip));
                $query->where('tm + '. $db->quote($locktime) .'>'. $db->quote($now));
                $db->setQuery($query);
                $items = $db->loadResult();
		
		// Call count, if conditions are met
		if(empty($items) AND $bot == 0 AND $iplock == 0) 
		{
                    $query = $db->getQuery(true);
                    $query->insert($db->quoteName('#__cwtraffic'));
                    $query->columns('tm, ip');
                    $query->values($db->quote($now) . ',' . $db->quote($ip)); 
                    $db->setQuery($query);
                    $db->query();
			
		}
		return $query;
	}
    }
}

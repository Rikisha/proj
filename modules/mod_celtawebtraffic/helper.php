<?php defined('_JEXEC') or die('Restricted access');
/**
 * @package             Joomla
 * @subpackage          CeltaWeb Traffic Component
 * @author              Steven Palmer
 * @author url          http://coalaweb.com
 * @author email        support@coalaweb.com
 * @license             GNU/GPL, see /files/en-GB.license.txt
 * @copyright           Copyright (c) 2013 Steven Palmer All rights reserved.
 * 
 * The CeltaWeb traffic module was inspired by VCNT Thanks to Viktor Vogel {@link http://joomla-extensions.kubik-rubik.de/}
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

class mod_celtawebtrafficHelper extends JObject
{

        public static function getIpAddress()
        {
            foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
                if (array_key_exists($key, $_SERVER) === true){
                    foreach (explode(',', $_SERVER[$key]) as $ip){
                        $ip = trim($ip); // just to be safe

                        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        
                            return ($ip);
                        }
                    }
                }
            }
        }

	
	// Function - Counting Data
	function read(&$params)
	{
		$db = JFactory::getDbo();
                
                //Work out the time off set
                $config   = JFactory::getConfig();
                $siteOffset = $config->getValue('config.offset');
                date_default_timezone_set($siteOffset);
              
		$day 			=	date('d');
		$month			=	date('m');
		$year			=	date('Y');
		$daystart		=	mktime(0,0,0,$month,$day,$year);
		$monthstart		=	mktime(0,0,0,$month,1,$year);
		$yesterdaystart         =	$daystart - (24*60*60);
                $weekstart              =       $daystart - ((date('N') - 1) * 24 * 60 * 60);
                $preset			= 	$params->get('preset', 0);

                //Count ongoing total
                $query = $db->getQuery(true);
                $query->select('TCOUNT');
                $query->from($db->quoteName('#__cwtraffic_total'));
                $db->setQuery($query);
                $tcount = $db->loadResult();
        
		// Create base to count from
                $query = $db->getQuery(true);
                $query->select('count(*)');
                $query->from($db->quoteName('#__cwtraffic'));
                $db->setQuery($query);
                $all_visitors = $db->loadResult();
                $all_visitors += $preset;
                $all_visitors += $tcount;
                
                //Todays Visitors
                $query = $db->getQuery(true);
                $query->select('count(*)');
                $query->from($db->quoteName('#__cwtraffic'));
                $query->where('tm > '. $db->quote($daystart));
                $db->setQuery($query);
                $today_visitors = $db->loadResult();
		
                //Yesterdays Visitors
                $query = $db->getQuery(true);
                $query->select('count(*)');
                $query->from($db->quoteName('#__cwtraffic'));
                $query->where('tm > '. $db->quote($yesterdaystart));
                $query->where('tm < '. $db->quote($daystart));
                $db->setQuery($query);
                $yesterday_visitors = $db->loadResult();
                
                //This Weeks Visitors
                $query = $db->getQuery(true);
                $query->select('count(*)');
                $query->from($db->quoteName('#__cwtraffic'));
                $query->where('tm >= '. $db->quote($weekstart));
                $db->setQuery($query);
                $week_visitors = $db->loadResult();
                
                //Months Visitors
                $query = $db->getQuery(true);
                $query->select('count(*)');
                $query->from($db->quoteName('#__cwtraffic'));
                $query->where('tm >= '. $db->quote($monthstart));
                $db->setQuery($query);
                $month_visitors = $db->loadResult();

		$ret = array($all_visitors, $today_visitors, $yesterday_visitors, $week_visitors, $month_visitors);
		return ($ret);
	}
	
            /**
            * Returns an array containing web visitor information
            *
            * @access public
            * @static
            * @return array
            *
            */
            
           public static function getBrowser()
            {
                $u_agent = $_SERVER['HTTP_USER_AGENT'];
                $bname = 'Unknown';
                $platform = 'Unknown';

                //First get the platform?
                if (preg_match('/linux/i', $u_agent)) {
                    $platform = 'Linux';
                }
                elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
                    $platform = 'Mac';
                }
                elseif (preg_match('/windows|win32/i', $u_agent)) {
                    $platform = 'Windows';
                }

                // Next get the name of the useragent yes seperately and for good reason
                if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
                {
                    $bname = 'IE';
                    $ub = "MSIE";
                }
                elseif(preg_match('/Firefox/i',$u_agent))
                {
                    $bname = 'Firefox';
                    $ub = "Firefox";
                }
                elseif(preg_match('/Chrome/i',$u_agent))
                {
                    $bname = 'Chrome';
                    $ub = "Chrome";
                }
                elseif(preg_match('/Safari/i',$u_agent))
                {
                    $bname = 'Safari';
                    $ub = "Safari";
                }
                elseif(preg_match('/Opera/i',$u_agent))
                {
                    $bname = 'Opera';
                    $ub = "Opera";
                }
                elseif(preg_match('/Netscape/i',$u_agent))
                {
                    $bname = 'Netscape';
                    $ub = "Netscape";
                }

                return array(
                    'userAgent' => $u_agent,
                    'name'      => $bname,
                    'platform'  => $platform,
                );
            }
            
            
            // Who is online
            
            // show online count
            static function getOnlineCount() {
		$db		= JFactory::getDbo();
		// calculate number of guests and users
		$result	= array();
		$user_array  = 0;
		$guest_array = 0;
		$query	= $db->getQuery(true);
		$query->select('guest, usertype, client_id');
		$query->from('#__session');
		$query->where('client_id = 0');
		$db->setQuery($query);
		$sessions = (array) $db->loadObjectList();

		if (count($sessions)) {
			foreach ($sessions as $session) {
				// if guest increase guest count by 1
				if ($session->guest == 1 && !$session->usertype) {
					$guest_array ++;
				}
				// if member increase member count by 1
				if ($session->guest == 0) {
					$user_array ++;
				}
			}
		}

		$result['user']  = $user_array;
		$result['guest'] = $guest_array;

		return $result;
	}

	// show online member names
	static function getOnlineUserNames($params) {
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		$query->select('a.username, a.time, a.userid, a.usertype, a.client_id');
		$query->from('#__session AS a');
		$query->where('a.userid != 0');
		$query->where('a.client_id = 0');
		$query->group('a.userid');
		$user = JFactory::getUser();
		if (!$user->authorise('core.admin') && $params->get('filter_groups', 0) == 1)
		{
			$groups = $user->getAuthorisedGroups();
			if (empty($groups))
			{
				return array();
			}
			$query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
			$query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
			$query->where('ug.id in (' . implode(',', $groups) . ')');
			$query->where('ug.id <> 1');
		}
		$db->setQuery($query);
		return (array) $db->loadObjectList();
	}
}

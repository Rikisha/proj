<?php
/**
 * @package             Joomla
 * @subpackage          CW Traffic Clean Plugin
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

class plgSystemCwtrafficClean extends JPlugin {

	function onAfterInitialise()
	{
            
                $componentParams = JComponentHelper::getParams('com_celtawebtraffic');
                $db_clean        =       $componentParams->get('db_clean',0);
                
                if($db_clean) {

                        $db	= JFactory::getDbo();

                        $config   = JFactory::getConfig();
                        $siteOffset = $config->getValue('config.offset');
                        date_default_timezone_set($siteOffset);

                        $month = date('m');
                        $year = date('Y');
                        $monthstart = mktime(0, 0, 0, $month, 1, $year);

                        $cleanstart = $monthstart - (8 * 24 * 60 * 60);

                        $query = $db->getQuery(true);
                        $query->select('count(*)');
                        $query->from($db->quoteName('#__cwtraffic'));
                        $query->where('tm < '. $db->quote($cleanstart));
                        $db->setQuery($query);
                        $oldrows = $db->loadResult();

                        if(!empty($oldrows))
                        {    
                            $query = $db->getQuery(true);
                            $query->update($db->quoteName('#__cwtraffic_total'));
                            $query->set('tcount = tcount +' . $db->quote($oldrows)); 
                            $db->setQuery($query);
                            $db->query();

                            $query = $db->getQuery(true);
                            $query->from($db->quoteName('#__cwtraffic'));
                            $query->delete();
                            $query->where('tm < '. $db->quote($cleanstart));
                            $db->setQuery($query);
                            $db->query();
                        }

                        return;
                }
        }
}

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

// import Joomla modelform library
jimport('joomla.application.component.modellist');
JLoader::register('CeltawebtrafficModelVisitors', JPATH_COMPONENT.'/models/visitors.php');

/**
 *  Model
 */
class CeltawebtrafficModelCSVReport extends CeltawebtrafficModelVisitors
{
    /**
     * Method to set the state using the values from the visitors view
     */
    public function setModelState()
    {
        $this->context = 'com_celtawebtraffic.visitors';
        parent::populateState();
    }
    
    	protected function getListQuery()
	{
		// Create a new query object.
		$db         = $this->getDbo();
		$query      = $db->getQuery(true);
                
                    // Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
                                'a.id AS ID, DATE(FROM_UNIXTIME(tm)) AS Date, a.ip as IP, w.visitors AS Name, a.country_name AS Country')
                                );
		// From the cwtraffic table
                $query->from($db->quoteName('#__cwtraffic').' AS a');
                
                //Join it to the whoiswho table
                $query->join('LEFT OUTER', $db->quoteName('#__cwtraffic_whoiswho').' AS w ON w.ip = a.ip');
                
                // Filter by search in title
		$search = $this->getState('filter.search');
 
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));

			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where(
                                '('.$db->quoteName('a.ip').' LIKE '.$search.
                                ' OR DATE(FROM_UNIXTIME(tm)) LIKE '.$search .
                                ' OR '.$db->quoteName('w.visitors').' LIKE '.$search.')'
                            );
			}
		}
                
                
                
		// Add the list ordering clause.
		$query->order($db->escape($this->getState('list.ordering', 'a.tm')).' '.$db->escape($this->getState('list.direction', 'desc')));
                
                
		return $query;
	}
}

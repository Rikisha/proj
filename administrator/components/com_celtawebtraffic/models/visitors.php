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

// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * Celtawebtraffic List Model
 */
class CeltawebtrafficModelVisitors extends JModelList
{
    
    	/**
	 * Constructor.
	 *
	 * @param	array	An optional associative array of configuration settings.
	 * @see		JController
	 * @since	1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id', 'a.id',
				'tm', 'a.tm',
				'ip', 'a.ip',
                                'country', 'a.country_name',
                                'visitors', 'w.visitors',

			);
		}

		parent::__construct($config);
	}
        
        /**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication('administrator');

		// Load the filter state.
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
                
//                $state = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
//		$this->setState('filter.state', $state);

		// Load the parameters.
		$params = JComponentHelper::getParams('com_celtawebtraffic');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.tm', 'desc');
	}
        
        	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param	string		$id	A prefix for the store id.
	 * @return	string		A store id.
	 * @since	1.6
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id.= ':' . $this->getState('filter.search');
//		$id.= ':' . $this->getState('filter.state');


		return parent::getStoreId($id);
	}
        
        
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db         = $this->getDbo();
		$query      = $db->getQuery(true);
		$user       = JFactory::getUser();
                
                    // Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
                                'a.id, a.tm, DATE(FROM_UNIXTIME(tm)) AS date, a.ip, w.visitors AS who, w.description AS description, a.country_code, a.country_name as country_id, a.city')
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
                                ' OR '.$db->quoteName('a.country_name').' LIKE '.$search.
                                ' OR '.$db->quoteName('w.visitors').' LIKE '.$search.')'
                            );
			}
		}
                
		// Add the list ordering clause.
		$query->order($db->escape($this->getState('list.ordering', 'a.tm')).' '.$db->escape($this->getState('list.direction', 'desc')));
                
                
		return $query;
	}


}


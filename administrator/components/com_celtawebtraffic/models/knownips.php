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
 *  Model
 */
class CeltawebtrafficModelKnownips extends JModelList
{
    
    /**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,visitors,ip,description');
		$query->from('#__cwtraffic_whoiswho');

                $search = $this->getState('filter.search');

		$db = $this->getDbo();

		if (!empty($search)) {
			$search = '%' . $db->getEscaped($search, true) . '%';

			$field_searches =
				"(description LIKE '{$search}' OR " .
				"visitors LIKE '{$search}')";

			$query->where($field_searches);
		}



		return $query;
	}
        

}

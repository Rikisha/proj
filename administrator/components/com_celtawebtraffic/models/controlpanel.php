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

jimport('joomla.application.component.model');
JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class CeltawebtrafficModelControlpanel extends JModel {
    
    function getCountries()
    {
            $query = 'SELECT a.country_code,a.country_name, COUNT(1) as num'
            . " FROM #__cwtraffic AS a where country_code is not null and country_code<>''"
            . ' GROUP BY a.country_code,a.country_name ORDER BY 3 DESC LIMIT 0,5';

      return $this->_getList($query);
    }
	
    function getCities()
    {
            $query = 'SELECT a.city,a.country_name,a.country_code, COUNT(1) as num'
            . " FROM #__cwtraffic AS a where city is not null and city<>''"
            . ' GROUP BY a.city,a.country_name,a.country_code ORDER BY 4 DESC LIMIT 0,5';

      return $this->_getList($query);
    }

}

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
 
// import Joomla table library
jimport('joomla.database.table');
 
/**
 * Table class
 */
class CeltawebtrafficTableWhoiswho extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	public function __construct(&$_db)
	{
		parent::__construct('#__cwtraffic_whoiswho', 'id', $_db);
	}
	/**
	 * Overloaded bind function
	 *
	 * @param       array           named array
	 * @return      null|string     null is operation was satisfactory, otherwise returns an error
	 * @see         JTable:bind
	 * @since       1.5
	 */
//	public function bind($array, $ignore = '') 
//	{
//		if (isset($array['params']) && is_array($array['params'])) 
//		{
//			// Convert the params field to a string.
//			$parameter = new JRegistry;
//			$parameter->loadArray($array['params']);
//			$array['params'] = (string)$parameter;
//		}
//		return parent::bind($array, $ignore);
//	}
// 
//	/**
//	 * Overloaded load function
//	 *
//	 * @param       int $pk primary key
//	 * @param       boolean $reset reset data
//	 * @return      boolean
//	 * @see         JTable:load
//	 */
//	public function load($pk = null, $reset = true) 
//	{
//		if (parent::load($pk, $reset)) 
//		{
//			// Convert the params field to a registry.
//			$params = new JRegistry;
//			$params->loadJSON($this->params);
//			$this->params = $params;
//			return true;
//		}
//		else
//		{
//			return false;
//		}
//	}
//	/**
//	 * Method to compute the default name of the asset.
//	 * The default name is in the form `table_name.id`
//	 * where id is the value of the primary key of the table.
//	 *
//	 * @return	string
//	 * @since	1.6
//	 */
//	protected function _getAssetName()
//	{
//		$k = $this->_tbl_key;
//		return 'com_celtawebtraffic.message.'.(int) $this->$k;
//	}
// 
//	/**
//	 * Method to return the title to use for the asset table.
//	 *
//	 * @return	string
//	 * @since	1.6
//	 */
//	protected function _getAssetTitle()
//	{
//		return $this->visitors;
//	}
// 
//	/**
//	 * Get the parent asset id for the record
//	 *
//	 * @return	int
//	 * @since	1.6
//	 */
//	protected function _getAssetParentId()
//	{
//		$asset = JTable::getInstance('Asset');
//		$asset->loadByName('com_celtawebtraffic');
//		return $asset->id;
//	}
}

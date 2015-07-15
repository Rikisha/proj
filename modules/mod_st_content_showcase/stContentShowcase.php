<?php
/**
 * @copyright	submit-templates.com
 * @license		GNU General Public License version 2 or later;
 */

// no direct access
defined('_JEXEC') or die;

require_once 'defined.php';
class stContentShowcase {
	
	public static $_model;  

	public static function getModel($model, $params = array()) 
	{
		require_once ST_MODEL_PATH.DIRECTORY_SEPARATOR.'model.php';
		
		require_once ST_MODEL_PATH.DIRECTORY_SEPARATOR.$model.DIRECTORY_SEPARATOR.$model.'.php';
		
		if (!self::$_model) {
			$class = ST_MODEL_PREFIX.$model;
			self::$_model = new $class($params);
		}
		
		return self::$_model;
	}
	
	public static function getModuleParams() 
	{
		$db = JFactory::getDbo();
		$id = JRequest::getInt('id', 0);
		$query = $db->getQuery(true);
		$query->select('*')
		->from('#__modules')
		->where('id = '.$id)
		->where('module = '. $db->quote(ST_NAME));
		
		$db->setQuery($query);
		
		$result = $db->loadObject();
		
		return isset($result->params) ? json_decode($result->params) : false;		
	}
}

<?php
/**
 * @copyright	submit-templates.com
 * @license		GNU General Public License version 2 or later;
 */

// no direct access
defined('_JEXEC') or die;

class stContentShowcaseModelFolder extends stContentShowcaseModel {
	
	public function _items() 
	{
		parent::_items();
		$items = array();
		$params = $this->_params;
			
		if ($params->get('ifolder_sync', 0)) 
		{
			$folders = $params->get('ifolder_folders', array());
			
			foreach ($folders as $key => $value) 
			{
				$files = JFolder::files(JPATH_ROOT.'/'.$value, '(.jpg|.png|.jpeg|.gif)$');
				
				foreach ($files as $k => $file) 
				{
					if (count($items) > $params->get('count', 10)) {
						break;
					}
					$item = new stdClass;
					$item->title = $file;
					$item->image = JURI::root().$value."/".$file;
					$item->image_intro = $item->image;
					$item->image_intro_caption = $file;
					$item->image_intro_alt = $file;
					$item->image_large = $item->image;
					$item->link = "";
					$item->introtext = $file;
					$items[] = $item;
				}
			}
		} 
		else 
		{
			$images = $params->get('ifolder_image');
			$titles = $params->get('ifolder_ititle');
			$intros  = $params->get('ifolder_iintrotext');
			
			foreach ($images as $key => $value) 
			{
				if ($value) 
				{
					if (count($items) > $params->get('count', 10)) {
						break;
					}
					$item  = new stdClass;
					$item->title = $titles[$key];
					$item->image = JURI::root().$value;
					$item->image_intro = $item->image;
					$item->image_intro_caption = $titles[$key];
					$item->image_intro_alt = $titles[$key];
					$item->image_large = $item->image;
					$item->link = "";
					$item->introtext = $intros[$key];
					$items[] = $item;
				}
		    }
		}
		
		return $items;
	}
}

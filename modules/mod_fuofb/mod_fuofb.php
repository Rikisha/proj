<?php
/**
* @version		$Id: mod_fuofb.php 10855 2012-01-24 16:32:34Z bbrock $
* @package		mod_fuofb
* @copyright	Copyright (C) 2012 River Media. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once( dirname(__FILE__).'/helper.php' );

$facebook_url		= $params->get('facebook_url', 'http://facebook.com/');
$target				= $params->get('target',1);
$language			= $params->get('language', 'en');
$image_style		= $params->get('image_choice', 1);
$image_align		= $params->get('image_align', 'center');
$custom_image		= $params->get('custom_image', 0);
$use_custom_image	= $params->get('use_custom_image', 0);
$popup_text			= $params->get('title_text', '');
$set_Itemid			= intval($params->get('set_itemid', 0));
$moduleclass_sfx	= $params->get('moduleclass_sfx', '');

if($use_custom_image){
	$image = @modFUOFBHelper::getFUOFBCustomImage( $popup_text, $custom_image );
}else{
	$image = modFUOFBHelper::getFUOFBImage( $popup_text, $image_style, $language );
}

$url = $facebook_url;
	
require JModuleHelper::getLayoutPath('mod_fuofb', $params->get('layout', 'default'));

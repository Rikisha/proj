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

class modFUOFBHelper {

    static function getFUOFBImage($image_text,$image_style,$language) {
    	$mod_URL = 'media/mod_fuofb/images/'.$language.'/';
    	$mod_path = 'media/mod_fuofb/images/'.$language.'/';
    	$img_URL = $mod_URL.'find-us-on-facebook-'.$image_style.'.png';
    	$img_path = $mod_path.'find-us-on-facebook-'.$image_style.'.png';
		$size = getimagesize(JPATH_BASE.'/'.$img_path); //get dimensions of image
    	$attr = array('title'=>$image_text,'width'=>$size[0],'height'=>$size[1]);
    	$img =  JHTML::image(JURI::base().$img_URL,'Facebook Image',$attr);
	    
		return $img;
	}

    function getFUOFBCustomImage($image_text,$custom_image) {
    	$mod_URL = 'media/mod_fuofb/images/';
    	$mod_path = 'media/mod_fuofb/images/';
    	$img_URL = $mod_URL.$custom_image;
    	$img_path = $mod_path.$custom_image;
		$size = getimagesize(JPATH_BASE.'/'.$img_path); //get dimensions of image
    	$attr = array('title'=>$image_text,'width'=>$size[0],'height'=>$size[1]);
    	$img =  JHTML::image(JURI::base().$img_URL,'Find Us On FaceBook - Image',$attr);
	    
		return $img;
	}
}
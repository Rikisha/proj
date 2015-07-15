<?php
/**
 * @author    JoomlaShine.com http://www.joomlashine.com
 * @copyright Copyright (C) 2008 - 2011 JoomlaShine.com. All rights reserved.
 * @license   GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
 */

	// No direct access
	defined('_JEXEC') or die('Restricted access');
	
	// Template attributes
	$jsn_template_attrs = array(
		'width' => array ('narrow', 'wide', 'float'),
		'textstyle' => array('personal'),
		'textsize' => array('medium'),
		'color' => array ('darkblue'),
		'direction' => array ('ltr', 'rtl'),
		'specialfont' => array ('no'),
		'promoleftwidth' => 'integer',
		'promorightwidth' => 'integer',
		'leftwidth' => 'integer',
		'rightwidth' => 'integer',
		'innerleftwidth' => 'integer',
		'innerrightwidth' => 'integer',
		'preset' => array('default')
	);
	
	$jsn_textstyles_config = array(
		'personal' => array(
			'font-a' => '"Trebuchet MS", Helvetica, sans-serif',
			'font-b' => 'Georgia, serif',
			'size-medium' => '80%'
		)
	);
	
	$jsn_font_b_elements = array(
		'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
		'#jsn-pos-mainmenu a', '#jsn-pos-mainmenu span',
		'.componentheading', '.contentheading',
		'.pathway'
	);
?>
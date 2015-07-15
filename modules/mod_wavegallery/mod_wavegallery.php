<?php
/**
 * "Wave Gallery" Joomla module
 * Copyright (C) 2012 Daniel Pardons
 * License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 * Author: Daniel Pardons
 * Website: http://www.joompad.be
 */

// no direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__).DS.'helper.php';

$document   =   &JFactory::getDocument();
$document->addStyleSheet('modules/mod_wavegallery/css/ui-lightness/jquery-ui-1.8.16.custom.css');
$document->addStyleSheet('modules/mod_wavegallery/css/style.css');
?>
<link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />

<?php
$list = modWaveGalleryHelper::getList( $params );

// include js resources
// load jquery library if requested
$document =& JFactory::getDocument();
if ($params->get('load_JQuery')==1)  {
	$document->addScript(JURI::base() . 'modules/mod_wavegallery/js/jquery-1.7.1.min.js');
}
if ($params->get('load_JQueryUI')==1)  {
	$document->addScript(JURI::base() . 'modules/mod_wavegallery/js/jquery-ui-1.8.16.custom.min.js');
}

if ($params->get('load_JQueryEasing')==1)  {
	$document->addScript(JURI::base() . 'modules/mod_wavegallery/js/jquery.easing.1.3.js');
}
$document->addScript(JURI::base() . 'modules/mod_wavegallery/js/jquery.tmpl.min.js');
$document->addScript(JURI::base() . 'modules/mod_wavegallery/js/jquery.mousewheel.min.js');
$document->addScript(JURI::base() . 'modules/mod_wavegallery/js/jquery.pad_sinusoid.min.js');


//$module_id		= $params->get( 'mod_id' );

$top_txt		= $params->get( 'top_txt', '' );
$bottom_txt		= $params->get( 'bottom_txt', '' );

$circular_mode	= $params->get( 'circular_mode') ? "true" : "false";
//$gallery_navigation	= $params->get( 'g_nav' ) ? "true" : "false";



//dump ($params->get( 'circular_mode' ), 'circ_mode');
//dump ($circular_mode,'$circular_mode');
//$itemLayout =  JModuleHelper::getLayoutPath($module->module,'_item'.DS.$params->get('contentslider_layout','image-description') ) ;
require( JModuleHelper::getLayoutPath($module->module) );


?>
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($) {
	$("#wd-wrapper").sinusoid({
		initMode			: "<?php echo $params->get( 'starting_mode' ) ?>",
		circular			: <?php echo $circular_mode ?>,
		speed				: <?php echo $params->get( 'speed' ) ?>,
		easing				: "<?php echo $params->get( 'effect' ) ?>",
		minImgW				: <?php echo $params->get( 'small_img_min_width' ) ?>,
		maxImgW				: <?php echo $params->get( 'small_img_max_width' ) ?>,
		minImgAngle			: <?php echo $params->get( 'img_min_angle' ) ?>,
		maxImgAngle			: <?php echo $params->get( 'img_max_angle' ) ?>,
		leftFactor			: <?php echo $params->get( 'left_factor' ) ?>,
		startFactor			: <?php echo $params->get( 'start_factor' ) ?>,
		marginMedium		: <?php echo $params->get( 'margin_medium' ) ?>,
		sinusoidFunction 	: {
			A	: <?php echo $params->get( 'sin_amplitude' ) ?>,
			T 	: <?php echo $params->get( 'sin_period' ) ?>,
			P	: <?php echo $params->get( 'sin_phase' ) ?>
		}
	});
});
</script>
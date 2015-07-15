<?php 
/*
# ------------------------------------------------------------------------
# Templates for Joomla 2.5 - Joomla 3.5
# ------------------------------------------------------------------------
# Copyright (C) 2011-2013 Jtemplate.ru. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: Makeev Vladimir
# Websites:  http://www.jtemplate.ru 
# ---------  http://code.google.com/p/jtemplate/   
# ------------------------------------------------------------------------
*/
// no direct access
defined('_JEXEC') or die;
$document 					=& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_jt_quick_contact_form/css/default.css');
//Params
$jt_id						= $params->get('jt_id', '');
$jt_jquery_ver				= $params->get('jt_jquery_ver', '1.8.3');
$jt_load_jquery				= (int)$params->get('jt_load_jquery', 1);
$jt_load_validate			= (int)$params->get('jt_load_validate', 1);
$jt_load_scripts			= (int)$params->get('jt_load_scripts', 1);
$moduleclass_sfx			= $params->get('moduleclass_sfx');
$jt_my_email				= $params->get('jt_my_email');
$jt_name_label				= $params->get('jt_name_label', 'Name:');
$jt_email_label				= $params->get('jt_email_label', 'e-mail:');
$jt_subject_label			= $params->get('jt_subject_label', 'Subject:');
$jt_message_label			= $params->get('jt_message_label', 'Message:');
$jt_send_label				= $params->get('jt_send_label', 'Send');
$jt_send_message			= $params->get('jt_send_message');
$jt_error_email				= $params->get('jt_error_email');
$jt_error_field				= $params->get('jt_error_field');
$jt_script_required			= $params->get('jt_script_required');
$jt_script_email			= $params->get('jt_script_email');
$jt_script_minlength		= $params->get('jt_script_minlength');

if ($jt_load_scripts == 0) {
	if ($jt_load_jquery  > 0) {
		$document->addScript('http://ajax.googleapis.com/ajax/libs/jquery/'.$jt_jquery_ver.'/jquery.min.js');
		}
	if ($jt_load_validate  > 0) {
		$document->addScript(JURI::base() . 'modules/mod_jt_quick_contact_form/js/jquery.validate.min.js');
		}
	$document->addCustomTag('<script type = "text/javascript">if (jQuery) jQuery.noConflict();</script>');
	}
if ($jt_load_scripts == 1) {
	if ($jt_load_jquery  > 0) {
		$document->addCustomTag('<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/'.$jt_jquery_ver.'/jquery.min.js"></script>');		
		}
	if ($jt_load_validate  > 0) { 
		$document->addCustomTag('<script type = "text/javascript" src = "'.JURI::root().'modules/mod_jt_quick_contact_form/js/jquery.validate.min.js"></script>'); 
		}
	$document->addCustomTag('<script type = "text/javascript">if (jQuery) jQuery.noConflict();</script>');	
}

$errMsg  = '';
$name    = '';
$email   = '';
$subject = ''; 
$message = '';

// clear data 
function clearData ($data, $type="string") {
	switch ($type) {
		case "string": 
					return trim(strip_tags($data));
					break;
		case "string_msg":
					return trim(htmlspecialchars($data,ENT_QUOTES));
					break;
		case "int":
					return (int)$data;
					break;
	}
}

// check email
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
					,$email));
}

require JModuleHelper::getLayoutPath('mod_jt_quick_contact_form', $params->get('layout', 'default'));
?>
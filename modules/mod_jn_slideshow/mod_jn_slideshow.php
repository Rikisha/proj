<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_jn_slideshow
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
ini_set("display_startup_errors","0");
ini_set("display_errors","0");
// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_jn_slideshow', $params->get('layout', 'default'));

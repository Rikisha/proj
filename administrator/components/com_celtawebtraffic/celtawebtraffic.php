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
 
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_celtawebtraffic')) {
    return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}
 
// Require helper file
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
JLoader::register('CeltawebtrafficHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'celtawebtraffic.php');

// Check count plugin
if (JPluginHelper::isEnabled('system', 'cwtrafficcount', true) == false) {
    echo JText::_('COM_CELTAWEBTRAFFIC_NOCOUNTPLUGIN_GENERAL_MESSAGE');
}
// Check clean plugin
if (JPluginHelper::isEnabled('system', 'cwtrafficclean', true) == false) {
    echo JText::_('COM_CELTAWEBTRAFFIC_NOCLEANPLUGIN_GENERAL_MESSAGE');
} 

// Lets get some style
JFactory::getDocument()->addStyleSheet("../media/com_celtawebtraffic/css/com-celtawebtraffic-base.css");

// Update countries and cities for visitors
CeltawebtrafficHelper::location_update();

// Load version.php
jimport('joomla.filesystem.file');
$version_php = JPATH_COMPONENT_ADMINISTRATOR.DS.'version.php';
if(!defined('COM_CELTAWEBTRAFFIC_VERSION') && JFile::exists($version_php)) {
    require_once $version_php;
}

$controller = JControllerLegacy::getInstance('Celtawebtraffic');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();

?>
<div class="cwt-powerby-back">
    <span class="cwt-powerby-back">
        <?php echo JTEXT::_('COM_CELTAWEBTRAFFIC_POWEREDBY_MSG'); ?> <a href="http://www.coalaweb.com" target="_blank" title="CoalaWeb">CoalaWeb</a> <?php echo JTEXT::_('COM_CELTAWEBTRAFFIC_POWEREDBY_VERSION'); echo COM_CELTAWEBTRAFFIC_VERSION ?>
    </span>
</div>

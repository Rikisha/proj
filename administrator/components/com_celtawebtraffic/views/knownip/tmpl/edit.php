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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$params = $this->form->getFieldsets('params');
JHTML::stylesheet('com-celtawebtraffic-base.css', JURI::root().'/media/com_celtawebtraffic/css/');
?>
<form action="<?php echo JRoute::_('index.php?option=com_celtawebtraffic&layout=edit&id='.(int) $this->item->id); ?>" method="post" id="adminForm" class="form-validate">
 
	<div class="width-100 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_TITLE_NOWNIP_DETAILS' ); ?></legend>
                <ul class="adminformlist">
                    <li>
                        <?php echo $this->form->getlabel('visitors'); ?>
                        <?php echo $this->form->getInput('visitors'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getlabel('ip'); ?>
                        <?php echo $this->form->getInput('ip'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getlabel('description'); ?>
                        <?php echo $this->form->getInput('description'); ?>
                    </li>
                </ul>
            <div class="clr"> </div>
        </fieldset>
        </div>


 
	<div>
		<input type="hidden" name="task" value="knownip.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
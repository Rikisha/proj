<?php
defined('_JEXEC') or die('Restricted Access');

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

?>

<tr>
	<th width="3%">
            <?php echo JText::_('COM_CELTAWEBTRAFFIC_HEADER_ID'); ?>
	</th>
	<th width="3">
            <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th width="20%">
            <?php echo JText::_('COM_CELTAWEBTRAFFIC_IP_OWNER'); ?>
	</th>
        <th width="20%">
            <?php echo JText::_('COM_CELTAWEBTRAFFIC_VISITOR_IP'); ?>
	</th>
        <th width="50%">
		<?php echo JText::_('COM_CELTAWEBTRAFFIC_IP_DESCRIPTION'); ?>
	</th>
</tr>

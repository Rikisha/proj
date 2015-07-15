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
<?php foreach($this->items as $i => $item): 
        $link 	= JRoute::_( 'index.php?option=com_celtawebtraffic&view=knownip&task=[knownip].edit&id='. $item->id );
        ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td class="center">
			<?php echo $item->id; ?>
		</td>
		<td class="center">
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
                    <a href="<?php echo $link; ?>" title="<?php echo JText::_( 'COM_CELTAWEBTRAFFIC_TT_EDIT' ); ?>"><?php echo $item->visitors; ?></a>
		</td>
                <td>
			<?php echo $item->ip; ?>
		</td>
                <td>
			<?php echo $item->description; ?>
                </td>

	</tr>
<?php endforeach; ?>

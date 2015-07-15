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

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');

$user		= JFactory::getUser();
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_celtawebtraffic&view=visitors'); ?>" method="post" id="adminForm" name="adminForm">
    
    	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<input class="cw-filter-search" type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_CELTAWEBTRAFFIC_SEARCH_LABEL'); ?>" />
			<button type="submit" class="button-blue"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" class="button-red"  onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>

	</fieldset>
	<div class="clr"> </div>
        
	<table class="adminlist">
            
		<thead>
                    <tr>
                        <th width="3%">
                                <?php echo JText::_('COM_CELTAWEBTRAFFIC_HEADER_ID'); ?>
                        </th>
                        <th width="3%">
                                <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
                        </th>			
                        <th width="10%">
                            <?php echo JHtml::_('grid.sort', 'COM_CELTAWEBTRAFFIC_VISITOR_IP', 'a.ip', $listDirn, $listOrder); ?>
                        </th>
                        <th width="15%">
                                <?php echo JHtml::_('grid.sort', 'COM_CELTAWEBTRAFFIC_VISITOR_DATE', 'a.tm', $listDirn, $listOrder); ?>
                        </th>
                        <th width="10%">
                                <?php echo JText::_('COM_CELTAWEBTRAFFIC_VISITOR_TIME'); ?>
                        </th>
                        <th width="39%">
                                <?php echo JHtml::_('grid.sort', 'COM_CELTAWEBTRAFFIC_IP_OWNER', 'w.visitors', $listDirn, $listOrder); ?>
                        </th>
                        <th width="20%">
				<?php echo JHTML::_('grid.sort', JText::_('COM_CELTAWEBTRAFFIC_HEADER_LOCATION'), 'a.country_name', $listDirn, $listOrder); ?>
			</th>		
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <td colspan="7"><?php echo $this->pagination->getListFooter(); ?></td>
                    </tr>
                </tfoot>
                
		<tbody>
                    <?php foreach($this->items as $i => $item) : ?>
                        <tr class="row<?php echo $i % 2; ?>">
                                <td class="center">
                                    <?php echo $this->escape($item->id); ?>
                                </td>
                                <td class="center">
                                    <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                                </td>
                                <td class="center">
                                    <?php echo $this->escape($item->ip); ?>
                                </td>
                                <td class="center">
                                    <?php
                                        $date= JHtml::date($item->tm , 'Y-m-d', false); 
                                        echo $date;
                                    ?>
                                </td>
                                <td class="center">
                                    <?php 
                                        $time= JHtml::date($item->tm , 'H:i', false); 
                                        echo $time;
                                    ?>
                                </td>  
                                <?php if ($item->who) { ?>
                                    <td class="cw_ipownerknown">
                                        <?php echo $item->who;?> 
                                        <p class="smallsub">
                                            <?php echo JText::sprintf('COM_CELTAWEBTRAFFIC_VISITOR_DESCRIPTION', $item->description);?>
                                        </p>
                                            
                                    </td>
                                <?php } else { ?>
                                    <td class="cw_ipownerunknown"><?php echo JText::_('COM_CELTAWEBTRAFFIC_UNKNOWN');?> </td>
                                <?php } ?>
                                <td>
				<?php 
                                    if(empty($item->country_code)){
                                        echo JText::_('COM_CELTAWEBTRAFFIC_LOCATION_UNKNOWN');
                                    } else {
                                        echo JHTML::_('image', 'media/com_celtawebtraffic/images/flags/'.$item->country_code.'.png', $item->country_code);
                                        echo " ".$item->country_id;
                                            if(empty($item->city)){
                                                echo ", ".JText::_('COM_CELTAWEBTRAFFIC_LOCATION_UNKNOWN');
                                            } else {
                                                echo ", ".$item->city;
                                            }
                                }?>
                                    </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
                <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
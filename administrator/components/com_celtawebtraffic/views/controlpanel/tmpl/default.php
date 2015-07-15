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

$user= &JFactory::getUser();
JHTML::stylesheet('com-celtawebtraffic-base.css', JURI::root().'/media/com_celtawebtraffic/css/');
?>

<div id="cpanel" style="float:left;width:58%;">
 
	<div style="float:left;">
    	<div class="icon">
	    	<a href="index.php?option=com_celtawebtraffic&view=visitors">
                    <img alt="<?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_VISITORS'); ?>" src="<?php echo JURI::root()?>/media/com_celtawebtraffic/images/icons/icon-48-cwt-visitors.png" />
                    <span><?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_VISITORS'); ?></span>
	    	</a>
    	</div>
  	</div>

        <div style="float:left;">
            <div class="icon">
                <a href="index.php?option=com_celtawebtraffic&view=knownips">
                    <img alt="<?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_KNOWNIPS'); ?>" src="<?php echo JURI::root()?>/media/com_celtawebtraffic/images/icons/icon-48-cwt-knownip.png" />
                    <span><?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_KNOWNIPS'); ?></span>
                </a>
            </div>
  	</div>
    
        <div style="float:left;">
            <div class="icon">
                <a href="index.php?option=com_celtawebtraffic&view=geoupload">
                    <img alt="<?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_GEO'); ?>" src="<?php echo JURI::root()?>/media/com_celtawebtraffic/images/icons/icon-48-cwt-geo.png" />
                    <span><?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_GEO'); ?></span>
                </a>
            </div>
  	</div>
    
        <div style="float:left;">
            <div class="icon">
                <a onclick="Joomla.popupWindow('http://coalaweb.com/services/joomla-services-such-a-great-cms/joomla-docs/item/celtaweb-traffic-guide', 'Help', 700, 500, 1)" href="#">
                        <img alt="<?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_HELP'); ?>" src="<?php echo JURI::root()?>/media/com_celtawebtraffic/images/icons/icon-48-cwt-support.png" />
                        <span><?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_HELP'); ?></span>
                </a>
            </div>
  	</div>
    
        <div style="float:left;">
            <div class="icon">
                <a class="modal" rel="{handler: 'iframe', size: {x: 875, y: 550}, onClose: function() {}}" href="index.php?option=com_config&view=component&component=com_celtawebtraffic&path=&tmpl=component">
                        <img alt="<?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_OPTIONS'); ?>" src="<?php echo JURI::root()?>/media/com_celtawebtraffic/images/icons/icon-48-cwt-options.png" />
                        <span><?php echo JText::_('COM_CELTAWEBTRAFFIC_TITLE_OPTIONS'); ?></span>
                </a>
            </div>
  	</div>


	<div class="clr"></div>
</div>
<div id="tabs" style="float:right; width:40%;">

 	<?php
$options = array(
    'onActive' => 'function(title, description){
        description.setStyle("display", "block");
        title.addClass("open").removeClass("closed");
    }',
    'onBackground' => 'function(title, description){
        description.setStyle("display", "none");
        title.addClass("closed").removeClass("open");
    }',
    'startOffset' => 0,  // 0 starts on the first tab, 1 starts the second, etc...
//    'useCookie' => true, // this must not be a string. Don't use quotes.
    'startTransition' => 1,
);?>
 
<?php echo JHtml::_('sliders.start', 'slider_group_id', $options); ?>
    
        <?php echo JHtml::_('sliders.panel', JText::_('COM_CELTAWEBTRAFFIC_SLIDER_TITLE_STATS'), 'slider_1_id'); ?>
                <!-- Top 5 Countries -->
                <table id="newspaper-stats">
                    <thead>
                        <tr>
                            <th width="85%">
                                <?php echo JText::_('COM_CELTAWEBTRAFFIC_HEADER_TOP5_COUNTRY'); ?>
                            </th> 
                            <th>
                                <?php echo JText::_('COM_CELTAWEBTRAFFIC_HEADER_COUNT'); ?>
                            </th> 
                        </tr>			
                    </thead>
                    <?php
                    $k = 0;
                    for ($i=0, $n=count( $this->countries ); $i < $n; $i++)
                    {
                        $row = &$this->countries[$i];
                            ?>
                            <tr class="<?php echo "row$k"; ?>">
                                <td>
                                    <?php 
                                        echo JHTML::_('image', 'media/com_celtawebtraffic/images/flags/'.$row->country_code.'.png', $row->country_code);
                                        echo ' '.$row->country_name; 
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row->num; ?>
                                </td>
                            </tr>
                            <?php
                            $k = 1 - $k;
                    }
                    ?>
                </table>
                <!-- Top 5 Cities -->
                <table id="newspaper-stats">
                    <thead>
                        <tr>
                            <th width="85%">
                                <?php echo JText::_('COM_CELTAWEBTRAFFIC_HEADER_TOP5_CITY'); ?>
                            </th> 
                            <th>
                                <?php echo JText::_('COM_CELTAWEBTRAFFIC_HEADER_COUNT'); ?>
                            </th> 
                        </tr>			
                    </thead>
                    <?php
                    $k = 0;
                    for ($i=0, $n=count( $this->cities ); $i < $n; $i++)
                    {
                            $row = &$this->cities[$i];
                            ?>
                            <tr class="<?php echo "row$k"; ?>">
                                <td>
                                    <?php 
                                    echo JHTML::_('image', 'media/com_celtawebtraffic/images/flags/'.$row->country_code.'.png', $row->country_code);
                                    echo ' '.$row->country_name.', '; 
                                    echo $row->city;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row->num; ?>
                                </td>
                            </tr>
                            <?php
                            $k = 1 - $k;
                    }
                    ?>
                </table>

 
    <?php echo JHtml::_('sliders.panel', JText::_('COM_CELTAWEBTRAFFIC_SLIDER_TITLE_ABOUT'), 'slider_2_id'); ?>
        <span class="cw-slider">
            <?php echo JText::_('COM_CELTAWEBTRAFFIC_ABOUT_DESCRIPTION');?>
        </span>
 
    <?php echo JHtml::_('sliders.panel', JText::_('COM_CELTAWEBTRAFFIC_SLIDER_TITLE_SUPPORT'), 'slider_3_id'); ?>
        <span class="cw-slider">
            <?php echo JText::_( 'COM_CELTAWEBTRAFFIC_SUPPORT_DESCRIPTION' ); ?>
        </span>
 
<?php echo JHtml::_('sliders.end'); ?>
</div>
<div class="clr"></div>









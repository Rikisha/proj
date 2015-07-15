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

JHTML::_('behavior.mootools', true);
JHtml::_('behavior.keepalive');
?>

<script type="text/javascript">
<!--
function processAction()
{
document.getElementById('cw-progress-bar').style.display = 'block';
}
//-->
</script>

<div id="cpanel" style="float:left;width:42%;">
            <fieldset>
            <legend><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_TITLE_GEODB_PREREC' ); ?></legend>
            <table id="newspaper-stats">
            <thead align="left">
                <tr>
                    <th align="left"><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_ITEM' ); ?></th>
                    <th width="25%"><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_MIN' ); ?></th>
                    <th width="25%"><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_CUR' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr class="row0">
                    <td><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_ITEM_CURL' ); ?></td>
                    <td><strong><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_INSTALLED' ); ?></strong></td>
                    
                    <?php if($this->curlInstalled()) { ?>
                    <td><strong style="color: green"><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_INSTALLED' ); ?></strong></td>
                    <?php } else { ?>
                    <td><strong style="color: red"><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_NOTINSTALLED' ); ?></strong></td>
                    <?php }?>
                    
                </tr>
            </tbody>
        </table>
        <span class="cw-message">
            <p class="alert">
                <?php echo JText::_( 'COM_CELTAWEBTRAFFIC_PREREC_ISSUES_MESSAGE' ); ?>
            </p>
        </span>
            
            </fieldset>
    <form action="<?php echo JRoute::_('index.php?option=com_celtawebtraffic&view=geoupload'); ?>"
          method="post" name="adminForm" id="adminForm" enctype="multipart/form-data" onsubmit="processAction();">

        <fieldset>
            <legend><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_TITLE_GEODB_UPLOAD' ); ?></legend>
            
            <div class="cw-upload-window">                
                <button class="button-blue" type="submit" onclick="Joomla.submitbutton('geoupload.upload')">
                    <?php echo JText::_('COM_CELTAWEBTRAFFIC_UPLOAD_BUTTON'); ?>
                </button>
            </div>
            <div class="clr"></div>

                <div id="cw-progress" class="cw-progress">
                    <div id="cw-progress-bar" name="cw-progress-bar" style="display:none">
                        <?php echo JHTML::_('image','media/com_celtawebtraffic/images/progressbar/progress-bar.gif', '') ?>
                    </div>
                    <span class="cw-message">
                        <p class="alert">
                            <?php echo JText::_('COM_CELTAWEBTRAFFIC_UPLOAD_MESSAGE'); ?>
                        </p>
                    </span>
                </div>
            
            <input type="hidden" name="task" value=""/>
            <?php echo JHTML::_('form.token'); ?>
        </fieldset>
    </form>
</div>

<div id="tabs" style="float:right; width:55%;">

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
    'useCookie' => true, // this must not be a string. Don't use quotes.
    'startTransition' => 1,
);?>
 
<?php echo JHtml::_('sliders.start', 'slider_group_id', $options); ?>
 
    <?php echo JHtml::_('sliders.panel', JText::_('COM_CELTAWEBTRAFFIC_SLIDER_TITLE_GEOGENERAL'), 'slider_1_id'); ?>
        <span class="cw-slider">
            <?php echo JText::_( 'COM_CELTAWEBTRAFFIC_GEODB_GENERAL' ); ?>
            <p class="forum"><?php echo JText::_( 'COM_CELTAWEBTRAFFIC_GEODB_WARNING' ); ?></p>
        </span>
    
    <?php echo JHtml::_('sliders.panel', JText::_('COM_CELTAWEBTRAFFIC_SLIDER_TITLE_GEOUPDATE'), 'slider_2_id'); ?>
        <span class="cw-slider">
            <?php echo JText::_( 'COM_CELTAWEBTRAFFIC_GEODB_STEPS' ); ?>
            <?php echo JText::_( 'COM_CELTAWEBTRAFFIC_GEODB_STEPS_MANUAL' ); ?>
        </span>
 
    <?php echo JHtml::_('sliders.panel', JText::_('COM_CELTAWEBTRAFFIC_SLIDER_TITLE_SUPPORT'), 'slider_3_id'); ?>
        <span class="cw-slider">
            <?php echo JText::_( 'COM_CELTAWEBTRAFFIC_SUPPORT_DESCRIPTION' ); ?>
        </span>
<?php echo JHtml::_('sliders.end'); ?>
</div>
<div class="clr"></div>





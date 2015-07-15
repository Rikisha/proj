<?php defined('_JEXEC') or die('Restricted access');
/**
 * @package             Joomla
 * @subpackage          CeltaWeb Traffic Module
 * @author              Steven Palmer
 * @author url          http://coalaweb.com
 * @author email        support@coalaweb.com
 * @license             GNU/GPL, see /files/en-GB.license.txt
 * @copyright           Copyright (c) 2013 Steven Palmer All rights reserved.
 *
 * The CeltaWeb traffic module was inspired by VCNT Thanks to Viktor Vogel {@link http://joomla-extensions.kubik-rubik.de/}
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

<div id="<?php echo $module_unique_id ?>">

	<?php if ($s_today) : ?>
                <?php echo $cssleft_t.''.$today.''.$cssclose ?><?php echo $cssright.''.$today_visitors.''.$cssclose ?><br />
	<?php endif; ?>
	<?php if ($s_yesterday) : ?>
		<?php echo $cssleft_y.''.$yesterday.''.$cssclose ?><?php echo $cssright.''.$yesterday_visitors.''.$cssclose ?><br />
	<?php endif; ?>	
	<?php if ($s_week) : ?>
		<?php echo $cssleft_w.''.$x_week.''.$cssclose ?><?php echo $cssright.''.$week_visitors.''.$cssclose ?><br />
	<?php endif; ?>
	<?php if ($s_month) : ?>
		<?php echo $cssleft_m.''.$x_month.''.$cssclose ?><?php echo $cssright.''.$month_visitors.''.$cssclose ?><br />
	<?php endif; ?>
	<?php if ($s_all) : ?>
		<?php echo $cssleft_a.''.$all.''.$cssclose ?><?php echo $cssright.''.$all_visitors.''.$cssclose ?><br />
	<?php endif; ?>
                
                
<?php if ($hline) : ?>
	<hr/>
<?php endif; ?>

<?php if ($s_guestip) : ?>
	<span class="cw_guestInfo"><?php echo $guestip.' '.$ip?></span>
<?php endif; ?>

 <?php if ($s_guestinfo) : ?>
        <span class="cw_guestInfo"><?php echo $guestinfo.' '.$yourbrowser;?></span>
 <?php endif; ?>

 <?php if ($s_dateTime) : ?>
        <span class="cw_guestInfo"><?php echo $date?></span>
 <?php endif; ?>
    
<div class="cw-traffic-mod-wio">
    <?php if ($s_whoisonline) : ?>        
        <?php if ($hlineWho) : ?>
                <hr/>
        <?php endif; ?>

        <?php if ($showmode == 0 || $showmode == 2) : ?>
            <?php if($display_title_who) : ?>
                <h<?php echo $title_format_who ?> class="<?php echo $title_align_who ?>">
                    <?php echo $title_who;?>
                </h<?php echo $title_format_who ?>>
            <?php endif; ?>
                <?php if ($s_who_guests) : ?>
                <?php $guest = JText::plural('MOD_CELTAWEBTRAFFIC_GUESTS', $count['guest']); ?>
                <span class="cw_guestInfo"><?php echo JText::sprintf('MOD_CELTAWEBTRAFFIC_WHOISONLINE_GUESTS', $guest); ?></span>
                <?php endif; ?>
                <?php if ($s_who_members) : ?>
                <?php $member = JText::plural('MOD_CELTAWEBTRAFFIC_MEMBERS', $count['user']); ?>
                <span class="cw_guestInfo"><?php echo JText::sprintf('MOD_CELTAWEBTRAFFIC_WHOISONLINE_MEMBERS', $member); ?></span>
                <?php endif; ?>
        <?php endif; ?>



        <?php if (($showmode > 0) && count($names)) : ?>
            <?php if($display_title_mb) : ?>
                <h<?php echo $title_format_who ?> class="<?php echo $title_align_who ?>">
                    <?php echo $title_mb;?>
                </h<?php echo $title_format_who ?>>
            <?php endif; ?>
                <?php if ($params->get('filter_groups')):?>
                        <span class="cw_guestInfo"><?php echo JText::_('MOD_CELTAWEBTRAFFIC_SAME_GROUP_MESSAGE'); ?></span>
                <?php endif;?>
                <ul>

                <?php foreach($names as $name) : ?>
                    <li>
                        <?php echo $name->username; ?>
                    </li>
                <?php endforeach;  ?>
                </ul>
        <?php endif; ?>
    <?php endif; ?>
 </div>

<?php if ($copy) : ?>
	<span class="cw_copyrht"><?php echo $powered ?> <a target="_blank" title="CoalaWeb" href="http://coalaweb.com">CoalaWeb</a></span>
<?php endif; ?>
</div>

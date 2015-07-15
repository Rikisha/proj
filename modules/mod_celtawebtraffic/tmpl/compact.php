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

$document = JFactory::getDocument();
$document->addStyleSheet(JURI :: base().'media/mod_celtawebtraffic/css/cw-base.css');
$document->addStyleSheet(JURI :: base().'media/mod_celtawebtraffic/css/themes/'.$select_theme.'/cw-visitors.css');
?>

<div id="<?php echo $module_unique_id ?>">
	<?php if ($hor_text) : ?>
            <?php echo $hor_text ?>
	<?php endif; ?>
	<?php echo $all_visitors ?>
        <?php if ($copy) : ?>
            <?php echo $separator ?>
            <a target="_blank" title="CoalaWeb" href="http://coalaweb.com">CoalaWeb</a>
        <?php endif; ?>

</div>

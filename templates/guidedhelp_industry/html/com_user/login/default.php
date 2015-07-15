<?php 
/**
* @package   Template Overrides YOOtheme
* @version   1.5.5 2009-07-02 16:22:01
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<?php if ($this->params->get( 'show_page_title', 1)) : ?>
<h1 class="pagetitle">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h1>
<?php endif; ?>

<?php echo $this->loadTemplate($this->type); ?>


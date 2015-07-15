<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/colorfall/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/colorfall/css/template_<?php echo $this->params->get('colorVariation'); ?>.css" type="text/css" />

</head>

<body>
<table id="main" class="width_<?php echo $this->params->get('widthStyle'); ?>" border="0" cellspacing="0" cellpadding="0">
  <tr class="row">
<!-- Three Columns -->
    <?php if($this->countModules('user1 or user2 or top')) : ?>
    <td class="content">
      <div id="top"><div id="sitename"><a href="<?php echo $this->baseurl ?>/"></a></div></div>
      <div id="articles">
	  <!-- System Message -->
      <?php if ($this->getBuffer('message')) : ?>
	    <div class="message"><jdoc:include type="message" /></div>
	  <?php endif; ?>
        <jdoc:include type="component" />
      </div>
    </td>
    <td class="lmods"><div class="modules_left"><jdoc:include type="modules" name="top" style="rounded" /><jdoc:include type="modules" name="user1" style="horz" /><jdoc:include type="modules" name="user2" style="horz" /></div></td>
    <td class="rmods"><div class="modules_right"><jdoc:include type="modules" name="left" style="xhtml" /><jdoc:include type="modules" name="right" style="xhtml" /></div></td>
<!-- Two Columns -->
    <?php else: ?>
    <td class="content_wide">
      <div id="top"><div id="sitename"><a href="<?php echo $this->baseurl ?>/"></a></div></div>
      <div id="articles">
	  <!-- System Message -->
      <?php if ($this->getBuffer('message')) : ?>
	    <div class="message"><jdoc:include type="message" /></div>
	  <?php endif; ?>
        <jdoc:include type="component" />
      </div>
    </td>
    <td class="rmods"><div class="modules_right"><jdoc:include type="modules" name="left" style="xhtml" /><jdoc:include type="modules" name="right" style="xhtml" /></div></td>
    <?php endif; ?>
  </tr>
  <tr class="row2">
    <?php if($this->countModules('user1 or user2 or top')) : ?>
    <td class="content">
      <p id="copyright">&copy; <?php echo $mainframe->getCfg('sitename') ;?>.<br /><?php echo JText::_('Powered by');?> <a href="http://www.joomla.org/">Joomla!</a>. <?php echo JText::_('Valid') ?> <a href="http://validator.w3.org/check/referer">XHTML</a> <?php echo JText::_('and') ?> <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>.</p>
	  <p id="copyleft"><span>Free template</span> 'Colorfall' by [ Anch ] <a href="http://support.gorsk.net">Gorsk.net Studio</a>. <span>Please, don't remove this hidden copyleft!</span></p>
    </td>
    <td class="lmods"><p id="feeds"><jdoc:include type="modules" name="syndicate" /></p></td>
    <td class="rmods_bottom"></td>
    <?php else: ?>
    <td class="content_wide">
      <p id="copyright">&copy; <?php echo $mainframe->getCfg('sitename') ;?>.<br /><?php echo JText::_('Powered by');?> <a href="http://www.joomla.org/">Joomla!</a>. <?php echo JText::_('Valid') ?> <a href="http://validator.w3.org/check/referer">XHTML</a> <?php echo JText::_('and') ?> <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>.</p>
      <p id="copyleft"><span>Free template</span> 'Colorfall' by [ Anch ] <a href="http://support.gorsk.net">Gorsk.net Studio</a>. <span>Please, don't remove this hidden copyleft!</span></p>
    </td>
    <td class="rmods_bottom"></td>
    <?php endif; ?>
  </tr>
</table>
<jdoc:include type="modules" name="debug" />
</body>
</html>
<?php
// no direct access
defined('_JEXEC') or die;
?>

<fieldset class="automailing-new">
<legend><?php echo JText::_('COM_NEWSLETTER_AUTOMAILING'); ?></legend>	
<table id="series-list-container" style="width:100%">
    <tr>
		<td width="45%" style="vertical-align: top;" colspan="2">

			<form name="automailingForm" method="POST" id="form-automailing" class="form-validate" action="<?php echo JRoute::_('index.php?option=com_newsletter'); ?>">

				<div class="fltrt">
					<?php echo JToolBar::getInstance('automailing')->render(); ?>
				</div>	
				
				<div id="form-container" class="fltlft">
					<div class="fltlft">
						<?php echo $this->form->getLabel('automailing_name'); ?>
						<?php echo $this->form->getInput('automailing_name'); ?>
					</div>

					<div class="fltrt">
						<?php echo $this->form->getLabel('automailing_event'); ?>
						<?php echo $this->form->getInput('automailing_event'); ?>
					</div>
				</div>	
					
				<input type="hidden" name="task" value="" />
				<?php echo $this->form->getInput('automailing_type'); ?>
				<?php echo $this->form->getInput('automailing_id'); ?>
				<input type="hidden" name="automailing_id" value="<?php echo $this->form->getValue('automailing_id'); ?>" />
				<?php echo JHtml::_('form.token'); ?>
            </form>
				
		</td>
	</tr>			
	<tr>
		<td width="50%">
			<fieldset>
				<legend><?php echo JText::_('COM_NEWSLETTER_SERIES'); ?></legend>	
				<div id="series-container">
					<?php echo $this->loadTemplate('series', ''); ?>
				</div>	
			</fieldset>
		</td>
		<td>			
			<fieldset>
				<legend><?php echo JText::_('COM_NEWSLETTER_LISTS'); ?></legend>
				<div id="lists-container">
					<?php 
						if ($this->automailing->automailing_type == 'scheduled') {
							echo $this->loadTemplate('targets', ''); 
						} else { ?>
							<div style="padding:50px 20px; text-align: center; font-weight: bold;">
								<?php echo JText::_('COM_NEWSLETTER_AUTOMAILING_TARGET_'.  strtoupper($this->automailing->automailing_event)); ?>
							</div>	
					<?php }	?>
				</div>	
			</fieldset>
		</td>
	</tr>
</table>

</fieldset>

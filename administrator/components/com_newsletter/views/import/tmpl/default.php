
<fieldset class="radio inputbox required" id="jform-comps">
	<legend for="jform_html"><?php echo JText::_('COM_NEWSLETTER_IMPORT_FROM_COMPONENTS'); ?></legend>

	<form name="adminForm" action="<?php echo JRoute::_('index.php?option=com_newsletter&task=configuration.import'); ?>" method="POST">

		<label><?php echo JText::_('COM_NEWSLETTER_SELECT_IMPORT_TYPE'); ?></label>
		<select name="jform-import-type">
			<option value="lists"><?php echo JText::_('COM_NEWSLETTER_LISTS_AND_SUBSCRIBERS'); ?></option>
		</select>

		<label><?php echo JText::_('COM_NEWSLETTER_SELECT_COMPONENT') . ':'; ?></label>
		<div class="components-list">
			<?php foreach ($this->components as $i => $item) : ?>
				<div class="row<?php echo $i % 2; ?>">
					<label <?php echo (!$item->valid)? 'class="not-available"' : ''; ?>
						for="jform_html0"
						class=""
						aria-invalid="false"
					>
						<?php echo $this->escape($item->name); ?>

					</label>

					<input
						type="radio"
						value="<?php echo $this->escape($item->type); ?>"
						name="jform-com"
						id="jform_html0"
						class=""
						aria-invalid="false"
						<?php echo (!$item->valid)? ' disabled="disabled" ' : ''; ?>
					>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="clr"></div>
		<div class="fltrt">
			<input type="submit" value="<?php echo JText::_('COM_NEWSLETTER_IMPORT'); ?>" />
		</div>

        <input type="hidden" name="subtask" value="" />
        <?php echo JHtml::_('form.token'); ?>

	</form>
</fieldset>
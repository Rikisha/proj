<?php

defined('JPATH_BASE') or die();

/**
 * Renders an html link element
 *
 * @package 	Joomla.Framework
 * @subpackage		Parameter
 * @since		1.5
 */

class JFormFieldExamples extends JFormField
{

	public $_name = 'Examples';

	public function getInput(){

		// Output		
		return "<a id=\"view\" href=\"#\" onclick=\"javascript: window.open('/modules/mod_fuofb/images.php', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=255,height=750'); return false\">Click to View</a>
";

	}
}

?>
<?php
/**
*Magic Point Header
*This program is free software: you can redistribute it and/or modify it under the terms
*of the GNU General Public License as published by the Free Software Foundation,
*either version 3 of the License, or (at your option) any later version.
*
*This program is distributed in the hope that it will be useful,
*but WITHOUT ANY WARRANTY; without even the implied warranty of
*MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*GNU General Public License for more details.
*
*You should have received a copy of the GNU General Public License
*along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*@author Magic Point
*@copyright (C) 2008 - 2011 Magic Point
*@link http://www.magicpoint.org Official website
**/
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.html.html');
jimport('joomla.form.formfield');
class JFormFieldColorpicker extends JFormField
{
    protected $type = 'Colorpicker';
    protected function getInput()
    {
        $name = $this->name;
        $value = $this->value;
        $id = $this->id;
        $path = 'modules/mod_mph/elements/';
        $js = "
        window.addEvent('domready', function() {
            var cp_$id = new MooRainbow('cp_$id', {
                'id': 'id_$id',
                'startColor': [58, 142, 246],
                'onChange': function(color) {
                    $('$id').value = color.hex;
                    $('cp_$id').setStyle('background-color', color.hex);
                }
            });
        });
        ";
        JHTML::_( 'behavior.mootools' );
        JHTML::_('stylesheet', $path."colorpicker.css");
        JHTML::_('script', $path."colorpicker.js");
        $document = JFactory::getDocument();
        $document->addScriptDeclaration( $js );
        $html = '';
        $html .= '<input id="'.$id.'" name="'.$name.'" value="'.$value.'" type="text" size="13"  class="colorpicker" />';
        $html .= '<div id="cp_'.$id.'" title="Pick a color" style="background-color:'.$value.'" class="colorpicker" />';
        return $html;
    }
}
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

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Visitors View
 */
class CeltawebtrafficViewVisitors extends JView
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
                
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		parent::display($tpl);
                $this->addToolbar();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar()
        {
		$canDo = CeltawebtrafficHelper::getActions();
                $state	= $this->get('State');
		
                JToolBarHelper::title(JText::_('COM_CELTAWEBTRAFFIC_TITLE_MAIN'). ' [ ' . JText::_( 'COM_CELTAWEBTRAFFIC_TITLE_VISITORS' ) . ' ]', 'cwt-visitors');
                
                JToolBarHelper::back( 'COM_CELTAWEBTRAFFIC_TITLE_CPANEL', 'index.php?option=com_celtawebtraffic' );
                
		if ($canDo->get('core.delete'))
		{
                    JToolBarHelper::divider();
                    JToolBarHelper::deleteList('', 'visitors.delete', 'JTOOLBAR_DELETE');
		}
                if ($canDo->get('core.admin'))
		{
                    $bar = JToolBar::getInstance('toolbar');
                    $bar->appendButton('Link', 'export', 'COM_CELTAWEBTRAFFIC_TITLE_REPORT', 'index.php?option=com_celtawebtraffic&task=visitors.csvreport');
		}
                if ($canDo->get('core.admin'))
		{
                    JToolBarHelper::divider();
                    JToolBarHelper::preferences('com_celtawebtraffic');
                }
                
                $help_url  = 'http://coalaweb.com/services/joomla-services-such-a-great-cms/joomla-docs/item/celtaweb-traffic-guide';
                JToolBarHelper::help( 'COM_CELTAWEBTRAFFIC_TITLE_HELP', false, $help_url );

	}

}

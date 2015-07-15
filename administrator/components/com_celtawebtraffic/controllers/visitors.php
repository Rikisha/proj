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

jimport('joomla.application.component.controlleradmin');

class CeltawebtrafficControllerVisitors extends JControllerAdmin {

    	public function getModel($name = 'Visitor', $prefix = 'CeltawebtrafficModel')
	{
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));
            return $model;
	}
        
        public function csvReport($prefix = 'CeltawebtrafficModel')
        {
            $model = $this->getModel('CSVReport', $prefix, array('ignore_request' => true));
            $model->setModelState();
            $data = $model->getItems();
            $this->exportReport($data);
        }
        
        protected function exportReport($data)
        {
            //Set Headers
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename='.'visitors.csv');
            
            if ($fp = fopen('php://output', 'w')) {
                
                //Output the first row with column headings
                if ($data[0]) {
                    fputcsv($fp, array_keys(JArrayHelper::fromObject($data[0])));
                }
                
                //Output the rows
                foreach ($data as $row) {
                    fputcsv($fp, JArrayHelper::fromObject($row));
                }
                // Close file
                fclose($fp);
            }
            JFactory::getApplication()->close();
            
        }// end of class
        
}

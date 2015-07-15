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

jimport('joomla.filesystem');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.archive');

class CeltawebtrafficControllerGeoupload extends JController
{
    public function __construct()
    {
        if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
        $this->path = JFactory::getConfig()->get('tmp_path') . '/com_celtawebtraffic';
        $this->pathArchive = $this->path . '/archives'; 
        $this->pathUnzipped = JPATH_COMPONENT_ADMINISTRATOR.DS.'assets'.DS.'geoip';
        parent::__construct();
    }
    
    public function upload()
    {
        $appl = JFactory::getApplication();
        $destination = $this->pathArchive. '/GeoLiteCity.dat.gz';
        $source	='http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz';
        
        // create a new cURL resource
        $resource = curl_init();

        // set URL and other appropriate options
        $options = array( CURLOPT_URL => $source,
                          CURLOPT_HEADER => false,
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_CONNECTTIMEOUT => 600
        );
        
        curl_setopt_array($resource, $options);

        // grab URL and pass it to the browser
        $content = curl_exec($resource);

        // close cURL resource, and free up system resources
        curl_close($resource);
          
       $path = $this->pathArchive;

        // if the archive folder doesn't exist - create it!
        if(!JFolder::exists($path)) {
            JFolder::create($path);
        } else {
        // let us remove all previous uploads
            $archiveFiles = JFolder::files($path);

            foreach ($archiveFiles as $archive) {
                if (!JFile::delete($this->pathArchive . '/'.$archive)) {
                    echo 'could not delete' . $archive;
                }
            }
        }
	 
        if($content != '') {
            $fp = fopen($destination, 'w');
            $fw = fwrite($fp, $content);
            fclose($fp);
        }
        if($fw != false){
            $message = 'COM_CELTAWEBTRAFFIC_UPLOAD_SUCCESSFUL';
        } else {
            $message = 'COM_CELTAWEBTRAFFIC_UPLOAD_FAILED';
        }

        $appl->redirect('index.php?option=com_celtawebtraffic&view=geoupload', JText::_($message));

        return $fw;
    }
    
    
    /**
     * unzip the file
     * @return bool
     */
    public function unzip()
    {
        JRequest::checkToken() or die( 'Invalid Token' );
        $appl = JFactory::getApplication();
        // if folder doesn't exist - create it!
        if(!JFolder::exists($this->pathUnzipped)) {
            JFolder::create($this->pathUnzipped); }

        $file = JFolder::files($this->pathArchive);
        $result = JArchive::extract($this->pathArchive .'/'. $file[0], $this->pathUnzipped);

        if ($result) {
            $message = 'COM_CELTAWEBTRAFFIC_UNZIP_SUCCESSFUL';
        } else {
            $message = 'COM_CELTAWEBTRAFFIC_UNZIP_FAILED';
        }

        $appl->redirect('index.php?option=com_celtawebtraffic&view=geoupload', JText::_($message));

        return $result;
    }

}

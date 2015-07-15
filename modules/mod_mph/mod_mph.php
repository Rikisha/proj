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
   *@copyright (C) 2008 - 2009 Magic Point
   *@link http://www.magicpoint.org Official website
   **/
  defined('_JEXEC') or die('Restricted access!');
  $vscript = $params->get('vscript');
  $mphwidth = $params->get('mphwidth');
  $mphheight = $params->get('mphheight');
  $mphtxtspd = $params->get('mphtxtspd');
  $mphtxtbkcol = str_replace('#','0x',$params->get('mphtxtbkcol'));
  $mphtxtbkop = $params->get('mphtxtbkop');
  $mphprlcol = str_replace('#','0x',$params->get('mphprlcol'));
  $mphshowbut = $params->get('mphshowbut');
  $mphnavnextbut = $params->get('mphnavnextbut');
  if ($mphshowbut == 'yes') {
      $mphnavnextbut = 'modules/mod_mph/buttons/next.png';
  } //if ($mphshowbut == 'yes')
  else {
      $mphnavnextbut = 'hidden';
  } //else
  $mphnavprevbut = $params->get('mphnavprevbut');
  if ($mphshowbut == 'yes') {
      $mphnavprevbut = 'modules/mod_mph/buttons/prev.png';
  } //if ($mphshowbut == 'yes')
  else {
      $mphnavprevbut = 'hidden';
  } //else
  $mphnavplaybut = $params->get('mphnavplaybut');
  if ($mphshowbut == 'yes') {
      $mphnavplaybut = 'modules/mod_mph/buttons/play.png';
  } //if ($mphshowbut == 'yes')
  else {
      $mphnavplaybut = 'hidden';
  } //else
  $mphnavpausebut = $params->get('mphnavpausebut');
  if ($mphshowbut == 'yes') {
      $mphnavpausebut = 'modules/mod_mph/buttons/pause.png';
  } //if ($mphshowbut == 'yes')
  else {
      $mphnavpausebut = 'hidden';
  } //else
  $mphauto = $params->get('mphauto');
  if ($mphauto == '1') {
      $mphauto = 'true';
  } //if ($mphauto == '1')
  else {
      $mphauto = 'false';
  } //else

 /** PARAMETERS **/

  /** IMAGE 1 **/
  $mph1 = $params->get('mph1');
  $mphimg01 = $params->get('mphimg01');
  $mphtrans01 = $params->get('mphtrans01');
  $mphstzm01 = $params->get('mphstzm01');
  $mphendzm01 = $params->get('mphendzm01');
  $mphstpos01 = $params->get('mphstpos01');
  $mphendpos01 = $params->get('mphendpos01');
  $mphtime01 = $params->get('mphtime01');
  $mphurl01 = $params->get('mphurl01');
  $mphtgt01 = $params->get('mphtgt01');
  $mphtxtcol01 = $params->get('mphtxtcol01');
  $mphtxtsize01 = $params->get('mphtxtsize01');
  $mphdesc01 = $params->get('mphdesc01');
  /** IMAGE 2 **/
  $mph2 = $params->get('mph2');
  $mphimg02 = $params->get('mphimg02');
  $mphtrans02 = $params->get('mphtrans02');
  $mphstzm02 = $params->get('mphstzm02');
  $mphendzm02 = $params->get('mphendzm02');
  $mphstpos02 = $params->get('mphstpos02');
  $mphendpos02 = $params->get('mphendpos02');
  $mphtime02 = $params->get('mphtime02');
  $mphurl02 = $params->get('mphurl02');
  $mphtgt02 = $params->get('mphtgt02');
  $mphtxtcol02 = $params->get('mphtxtcol02');
  $mphtxtsize02 = $params->get('mphtxtsize02');
  $mphdesc02 = $params->get('mphdesc02');
  /** IMAGE 3 **/
  $mph3 = $params->get('mph3');
  $mphimg03 = $params->get('mphimg03');
  $mphtrans03 = $params->get('mphtrans03');
  $mphstzm03 = $params->get('mphstzm03');
  $mphendzm03 = $params->get('mphendzm03');
  $mphstpos03 = $params->get('mphstpos03');
  $mphendpos03 = $params->get('mphendpos03');
  $mphtime03 = $params->get('mphtime03');
  $mphurl03 = $params->get('mphurl03');
  $mphtgt03 = $params->get('mphtgt03');
  $mphtxtcol03 = $params->get('mphtxtcol03');
  $mphtxtsize03 = $params->get('mphtxtsize03');
  $mphdesc03 = $params->get('mphdesc03');
  /** IMAGE 4 **/
  $mph4 = $params->get('mph4');
  $mphimg04 = $params->get('mphimg04');
  $mphtrans04 = $params->get('mphtrans04');
  $mphstzm04 = $params->get('mphstzm04');
  $mphendzm04 = $params->get('mphendzm04');
  $mphstpos04 = $params->get('mphstpos04');
  $mphendpos04 = $params->get('mphendpos04');
  $mphtime04 = $params->get('mphtime04');
  $mphurl04 = $params->get('mphurl04');
  $mphtgt04 = $params->get('mphtgt04');
  $mphtxtcol04 = $params->get('mphtxtcol04');
  $mphtxtsize04 = $params->get('mphtxtsize04');
  $mphdesc04 = $params->get('mphdesc04');
  /** IMAGE 5 **/
  $mph5 = $params->get('mph5');
  $mphimg05 = $params->get('mphimg05');
  $mphtrans05 = $params->get('mphtrans05');
  $mphstzm05 = $params->get('mphstzm05');
  $mphendzm05 = $params->get('mphendzm05');
  $mphstpos05 = $params->get('mphstpos05');
  $mphendpos05 = $params->get('mphendpos05');
  $mphtime05 = $params->get('mphtime05');
  $mphurl05 = $params->get('mphurl05');
  $mphtgt05 = $params->get('mphtgt05');
  $mphtxtcol05 = $params->get('mphtxtcol05');
  $mphtxtsize05 = $params->get('mphtxtsize05');
  $mphdesc05 = $params->get('mphdesc05');
 

  /** SHOWTIME **/

 //Debug Mode
  $debugMode = $params->get('debugMode');;
  if($debugMode==0) error_reporting(0); // Turn off all error reporting  
    
  //head
  global $mainframe;
  $mphreal = JURI::base();
  $document = &JFactory::getDocument();

  //head start
switch ($vscript) {
    case 'mod1':
        $jsswf_url = $RURL . "modules/mod_mph/js/swfobject.js";
        $document->addScript($jsswf_url);
        break;
    case 'mod2':
        $jsswf_url = 'http://ajax.googleapis.com/ajax/libs/swfobject/2.1/swfobject.js';
        $document->addScript($jsswf_url);
        break;
    case 'mod3':
        $loadswf = '';
        break;
    case 'mod4':
        $compat = 'yes';
        break;
}
  //create XML
  $xmlfile = JPATH_BASE . "/modules/mod_mph/mph.xml";
  if (is_file($xmlfile)){
   unlink($xmlfile);
  }
  touch($xmlfile) or die("Unable to create: " . $xmlfile);
  $playlist = '<?xml version="1.0" encoding="utf-8"?>' . "\n";
  $playlist .= '<MagicPointHeader
  width="' . $mphwidth . '"
  height="' . $mphheight . '"
  preloaderColor="' . $mphprlcol . '"
  textSpeed="' . $mphtxtspd . '"
  textBackColor="' . $mphtxtbkcol . '"
  textBackOpacity="' . $mphtxtbkop . '"
  slideshowOn="' . $mphauto . '"
  nextButton="' . $mphnavnextbut . '"
  prevButton="' . $mphnavprevbut . '"
  playButton="' . $mphnavplaybut . '"
  pauseButton="' . $mphnavpausebut . '">' . "\n";
   /** IMAGE 1 **/
  if (!empty($mphimg01)) {
      if ($mph1 == '1') {
		  $mph1 = 'on';
		$playlist .= '<image src="' . $mphimg01 . '" transition="' . $mphtrans01 . '" kenBurns="' . $mphstzm01 . ';' . $mphendzm01 . ';' . $mphstpos01 . ';' . $mphendpos01 . '" time="' . $mphtime01 . '"><![CDATA[<font color="' . $mphtxtcol01 . '" size="' . $mphtxtsize01 . '">' . $mphdesc01 . ']]></image>';
  } //if (!empty($mphimg01))
  } //if ($mph1 == '2')
  		else {$mph1 = 'off';}
  	/** IMAGE 2 **/
  if (!empty($mphimg02)) {
  	  if ($mph2 == '1') {
		  $mph2 = 'on';
      $playlist .= '<image src="' . $mphimg02 . '" transition="' . $mphtrans02 . '" kenBurns="' . $mphstzm02 . ';' . $mphendzm02 . ';' . $mphstpos02 . ';' . $mphendpos02 . '" time="' . $mphtime02 . '"><![CDATA[<font color="' . $mphtxtcol02 . '" size="' . $mphtxtsize02 . '">' . $mphdesc02 . ']]></image>';
  } //if (!empty($mphimg02))
  } //if ($mph2 == '2')
  		else {$mph2 = 'off';}
  	 /** IMAGE 3 **/
  if (!empty($mphimg03)) {
  	  if ($mph3 == '1') {
		  $mph3 = 'on';
      $playlist .= '<image src="' . $mphimg03 . '" transition="' . $mphtrans03 . '" kenBurns="' . $mphstzm03 . ';' . $mphendzm03 . ';' . $mphstpos03 . ';' . $mphendpos03 . '" time="' . $mphtime03 . '"><![CDATA[<font color="' . $mphtxtcol03 . '" size="' . $mphtxtsize03 . '">' . $mphdesc03 . ']]></image>';
  } //if (!empty($mphimg03))
  } //if ($mph3 == '2')
  		else {$mph3 = 'off';}
    /** IMAGE 4 **/
  if (!empty($mphimg04)) {
  	  if ($mph4 == '1') {
	 	  $mph4 = 'on';
      $playlist .= '<image src="' . $mphimg04 . '" transition="' . $mphtrans04 . '" kenBurns="' . $mphstzm04 . ';' . $mphendzm04 . ';' . $mphstpos04 . ';' . $mphendpos04 . '" time="' . $mphtime04 . '"><![CDATA[<font color="' . $mphtxtcol04 . '" size="' . $mphtxtsize04 . '">' . $mphdesc04 . ']]></image>';
  } //if (!empty($mphimg04))
  } //if ($mph4 == '2')
  		else {$mph4 = 'off';}
   /** IMAGE 5 **/
  if (!empty($mphimg05)) {
  	  if ($mph5 == '1') {
		  $mph5 = 'on';
      $playlist .= '<image src="' . $mphimg05 . '" transition="' . $mphtrans05 . '" kenBurns="' . $mphstzm05 . ';' . $mphendzm05 . ';' . $mphstpos05 . ';' . $mphendpos05 . '" time="' . $mphtime05 . '"><![CDATA[<font color="' . $mphtxtcol05 . '" size="' . $mphtxtsize05 . '">' . $mphdesc05 . ']]></image>';
  } //if (!empty($mphimg05))
  } //if ($mph5 == '2')
  		else {$mph5 = 'off';}
  

  		/** OUTPUT **/
  $playlist .= '</MagicPointHeader>';
  $handle = fopen($xmlfile, 'r+b') or die("Could not open file: " . $xmlfile . "\n");
  fwrite($handle, $playlist) or die("Could not write to file: " . $xmlfile . "\n");
  fclose($handle);
  chmod($xmlfile, 0777);
  $mphrnd = rand(250, 850);
  $mphflash = $mphreal . 'modules/mod_mph/mph.swf?' . $mphrnd;
  $mpid = 'mph';
  if ($mphsafe == 'yes') {
      $mphoutput = "<div align=\"center\"><object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" name=\"mph_$mphrnd\" width=\"$mphwidth\" height=\"$mphheight\" align=\"top\">
    <param name=\"src\" value=\"$mphflash\" />
    <param name=\"quality\" value=\"autohigh\" />
    <param name=\"salign\" value=\"l\" />
    <param name=\"flashvars\" value=\"mpid=$mpid\" />
    <param name=\"wmode\" value=\"transparent\" />
    <param name=\"name\" value=\"mph_$mphrnd\" />
    <param name=\"align\" value=\"top\" />
    <param name=\"base\" value=\"$mphreal\" />
    <param name=\"bgcolor\" value=\"#ffffff\" />
    <param name=\"width\" value=\"$mphwidth\" />
    <param name=\"height\" value=\"$mphheight\" />
    </object></div>";
  } //if ($mphsafe == 'yes')
  else {
      $mphoutput = "$loadswf<div id=\"mph_$mphrnd\">Please update your <a href=\"http://get.adobe.com/flashplayer/\" target=\"_blank\">Flash Player</a> to view content.</div>
    <script type=\"text/javascript\">
    var flashvars = { mpid: \"$mpid\", align: \"center\", showVersionInfo: \"false\"};
    var params = { wmode: \"transparent\", base: \"$mphreal\"};
    var attributes = {};
    swfobject.embedSWF(\"$mphflash\", \"mph_$mphrnd\", \"$mphwidth\", \"$mphheight\", \"9.0.0\", \"\", flashvars, params, attributes);
    </script>";
  } //else
  echo $mphoutput;
?>
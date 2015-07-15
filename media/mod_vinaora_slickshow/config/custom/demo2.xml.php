<?php
/**
 * @version		$Id: demo2.xml.php 2012-02-27 vinaora $
 * @package		VINAORA SLICK SLIDESHOW
 * @subpackage	mod_vinaora_slickshow
 * @copyright	Copyright (C) 2010 - 2012 VINAORA. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @website		http://vinaora.com
 * @twitter		http://twitter.com/vinaora
 * @facebook	http://facebook.com/vinaora
 */

// Get the beginning of URL
// Eg: URL = /media/mod_vinaora_slickshow/config/demo.xml.php --> Result = /
// Eg: URL = /path/to/sub/directory/media/mod_vinaora_slickshow/config/demo.xml.php --> Result = /path/to/sub/directory/
$script		= $_SERVER['SCRIPT_NAME'];
$base_path	= substr($script, 0 , strpos($script, 'media/mod_vinaora_slickshow'));

if (!headers_sent()) header ("content-type: text/xml");
?>
<banner width="960"
		height="360"
		backgroundColor="0x000000"
		backgroundTransparency="100"
		startWith="3"
		barHeight="50"
		fadeTransition="false"
		verticalTransition="true"
		controllerTop="true"
		transitionSpeed="1"
		titleX="0"
		titleY="0">
	<items>
		<item>
			<title></title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo2/slide_1.jpg</path>
			<url>http://vinaora.com/vinaora-cu3er-3d-slideshow/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>20</bar_transparency>
			<slideShowTime>3</slideShowTime>
		</item>

		<item>
			<title></title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo2/slide_2.jpg</path>
			<url>http://vinaora.com/vinaora-visitors-counter/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>20</bar_transparency>
			<slideShowTime>5</slideShowTime>
		</item>

		<item>
			<title></title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo2/slide_3.jpg</path>
			<url>http://vinaora.com/vinaora-world-time-clock/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>20</bar_transparency>
			<slideShowTime>8</slideShowTime>
		</item>

		<item>
			<title></title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo2/slide_4.jpg</path>
			<url>http://vinaora.com/vinaora-nivo-slider/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>20</bar_transparency>
			<slideShowTime>4</slideShowTime>
		</item>
	</items>
</banner>
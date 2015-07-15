<?php
/**
 * @version		$Id: demo3.xml.php 2012-02-27 vinaora $
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
<banner width="300"
		height="250"
		backgroundColor="0xffffff"
		backgroundTransparency="100"
		startWith="1"
		barHeight="25"
		fadeTransition="false"
		verticalTransition="true"
		controllerTop="false"
		transitionSpeed="1"
		titleX="10"
		titleY="10">
	<items>
		<item>
			<title>Vinaora Slick Slideshow</title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo3/slide_1.jpg</path>
			<url>http://vinaora.com/vinaora-cu3er-3d-slideshow/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>70</bar_transparency>
			<slideShowTime>3</slideShowTime>
		</item>

		<item>
			<title>Vinaora Cu3er 3D Slideshow</title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo3/slide_2.jpg</path>
			<url>http://vinaora.com/vinaora-cu3er-3d-slideshow/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>50</bar_transparency>
			<slideShowTime>3</slideShowTime>
		</item>

		<item>
			<title>Vinaora World Time Clock</title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo3/slide_3.jpg</path>
			<url>http://vinaora.com/vinaora-world-time-clock/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>70</bar_transparency>
			<slideShowTime>3</slideShowTime>
		</item>

		<item>
			<title>Vinaora Nivo Slider</title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo3/slide_4.jpg</path>
			<url>http://vinaora.com/vinaora-nivo-slider/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>70</bar_transparency>
			<slideShowTime>3</slideShowTime>
		</item>

		<item>
			<title>Vinaora 3D Slide-show</title>
			<path><?php echo $base_path; ?>media/mod_vinaora_slickshow/images/demo3/slide_5.jpg</path>
			<url>http://vinaora.com/vinaora-cu3er-3d-slideshow/</url>
			<target>_blank</target>
			<bar_color>0xffffff</bar_color>
			<bar_transparency>70</bar_transparency>
			<slideShowTime>3</slideShowTime>
		</item>
	</items>
</banner>
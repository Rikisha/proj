<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_jn_articles_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$width = $params->get('width');
$height = $params->get('height');

$title = array();
for($w = 1; $w <=5 ; $w++)
{
	if($params->get('title'.$w) != null)
		$title[] = $params->get('title'.$w);
}
$desc = array();
for($w = 1; $w <=5 ; $w++)
{
	if($params->get('desc'.$w) != null)
		$desc[] = $params->get('desc'.$w);
}
$link = array();
for($w = 1; $w <=5 ; $w++)
{
	if($params->get('link'.$w) != null)
		$link[] = $params->get('link'.$w);

}
$img = array();
for($w = 1; $w <=5 ; $w++)
{
	if($params->get('img'.$w) != null)
		$img[] = $params->get('img'.$w);

}
$linkname = array();
for($w = 1; $w <=5 ; $w++)
{
	if($params->get('linkname'.$w) != null)
		$linkname[] = $params->get('linkname'.$w);
}
$doc				= JFactory::getDocument();
if ($doc->direction == 'rtl') {
$doc->addStyleSheet('modules/mod_jn_slideshow/assets/css/style_rtl.css');
}
else
{
$doc->addStyleSheet('modules/mod_jn_slideshow/assets/css/style.css');
}
$doc->addScript('modules/mod_jn_slideshow/assets/js/jquery-1.6.min.js', 'text/javascript');
$doc->addScript('modules/mod_jn_slideshow/assets/js/jquery.imgpreload.min.js', 'text/javascript');
$c = count($img);

?>	
<script LANGUAGE="JavaScript">
$(document).ready(function(){

	// Generate Navigation links
	$('.marquee_panels .marquee_panel').each(function(index){
		$('.marquee_nav').append('<a class="marquee_nav_item"></a>');
	});
	
	// Generate Photo Lineup
	$('img.marquee_panel_photo').each(function(index){
		var photoWidth = $('.marquee_container').width();
		var photoPosition = index * photoWidth;
		$('.marquee_photos').append('<img class="marquee_photo" style="left: '+photoPosition+'" src="'+$(this).attr('src')+'" alt="'+$(this).attr('alt')+'" width="<?php echo $width?>" height="<?php echo $height?>" />');
		$('.marquee_photos').css('width', photoPosition+photoWidth);
	});

	// Set up Navigation Links
	$('.marquee_nav a.marquee_nav_item').click(function(){
		
		// Set the navigation state
		$('.marquee_nav a.marquee_nav_item').removeClass('selected');
		$(this).addClass('selected');
		
		var navClicked = $(this).index();
		var marqueeWidth = $('.marquee_container').width();
		var distanceToMove = marqueeWidth*(-1);
		var newPhotoPosition = navClicked*distanceToMove + 'px';
		var newCaption = $('.marquee_panel_caption').get(navClicked);
		
		// Animate the photos and caption
		$('.marquee_photos').animate({left: newPhotoPosition}, 1000);
		$('.marquee_caption').animate({top: '340px'}, 500, function(){
			var newHTML = $(newCaption).html();
			$('.marquee_caption_content').html(newHTML);
			setCaption();
		});
	});
	
	// Preload all images, then initialize marquee
	$('.marquee_panels img').imgpreload(function(){
		initializeMarquee();
	});

});

function initializeMarquee(){
	$('.marquee_caption_content').html(
		$('.marquee_panels .marquee_panel:first .marquee_panel_caption').html()
	);
	$('.marquee_nav a.marquee_nav_item:first').addClass('selected');
	$('.marquee_photos').fadeIn(1500);
	setCaption();
}

function setCaption(){
	var captionHeight = $('.marquee_caption').height();
	var marqueeHeight = $('.marquee_container').height();
	var newCaptionTop = marqueeHeight - captionHeight - 15;
	$('.marquee_caption').delay(100).animate({top: newCaptionTop}, 500);
}
</script>
	<div class="marquee_container" style="width:<?php echo $width ?>;height:<?php echo $height?>;clear:both;">
		<div class="marquee_photos"></div>
		<div class="marquee_caption" style="width:<?php echo $width ?>">
			<div class="marquee_caption_content"></div>
		</div>
		<div class="marquee_nav"></div>
	</div>
	<div class="marquee_panels">
		<?php
		
		for ($i = 0; $i<$c ; $i++)
		{
		?>
		<!-- Panel -->
		<div class="marquee_panel">
			<img class="marquee_panel_photo" src="<?php echo $img[$i] ?>" alt="<?php echo $title[$i] ?>" width="100" />
			<div class="marquee_panel_caption">
				<h2><?php echo  $title[$i] ?></h2>
				<p><?php echo  $desc[$i] ?></p>
				<p><a href="<?php echo  $link[$i] ?>"><?php echo  $linkname[$i] ?></a></p>
			</div>
		</div>
		<?php
		}
		?>
	</div>

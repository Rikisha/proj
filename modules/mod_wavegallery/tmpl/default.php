<?php
/**
 * "Wave Gallery" Joomla module
 * Copyright (C) 2012 Daniel Pardons
 * License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 * Author: Daniel Pardons
 * Website: http://www.joompad.be
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$g_left_margin = (int)$params->get( 'g_left_margin', '0' );
$g_right_margin = (int)$params->get( 'g_right_margin', '0' );
$scroller_height = (int)$params->get( 'scroller_height', '400' );
$scroller_bg_color = $params->get( 'scroller_bg_color' );
$scroller_bg_pattern = $params->get( 'scroller_bg_pattern' );
$slider_bar_bg_color = $params->get( 'slider_bar_bg_color' , "#CCC" );

$title_display_mode = $params->get( 'title_mode' );
$title_color= $params->get( 'title_color', 'white' );
$title_hilite_color= $params->get( 'title_hilite_color', 'red' );
$description_color = $params->get( 'description_color', 'white' );
$mod_assets_images_path = JURI::base(true)."/modules/mod_wavegallery/assets/images/";

$scroller_height = (int)$params->get( 'scroller_height', '400' );

$medium_img_width = (int)$params->get( 'medium_img_width', '140' );
$medium_img_height = (int)$params->get( 'medium_img_height', '195' );
$margin_medium = (int)$params->get( 'margin_medium', '0' );
$medium_img_width = (int)$params->get( 'medium_img_width', '140' );
$medium_overlay_bg_color = $params->get( 'medium_overlay_bg_color' , "#000" );
$medium_overlay_icon = $params->get( 'medium_overlay_icon', 'ov-eye.png' );
$medium_title_display = (int)$params->get( 'medium_title_display', '1' );
$medium_title_bg_color = $params->get( 'medium_title_bg_color' , "#000" );
$medium_title_bg_pattern = $params->get( 'medium_title_bg_pattern', 'bg-black.png' );

$item_overlay_bg_color = $params->get( 'item_overlay_bg_color' , 'transparent' );
$item_overlay_bg_pattern = $params->get( 'item_overlay_bg_pattern' , 'ov-black.png' );

$popup_width = (int)$params->get( 'popup_width', '800' );
$popup_height = (int)$params->get( 'popup_height', '400' );
$popup_bg_color = $params->get( 'popup_bg_color' , '#CCC' );
$popup_title_total_width = (int)$params->get( 'popup_title_total_width', '560' );
$popup_navbar_hover_bg_color = $params->get( 'popup_navbar_hover_bg_color' , '' );
$popup_title_bg_mode = $params->get( 'popup_title_bg_mode' , '1' );
$popup_title_css = $params->get( 'popup_title_css' );
$popup_description_css = $params->get( 'popup_description_css' );

// create inline css
$wgcss=	'';

// scroll wrapper area
$wgcss .= '
.wd-wrapper {
	margin-left: '.$g_left_margin.'px;
	margin-right: '.$g_right_margin.'px;
}';

$wgcss .= '
.wd-scroll-wrapper {
    height: '.$scroller_height.'px;';
	if ( $scroller_bg_pattern != -1) {
		$wgcss .='
	background: url('.$mod_assets_images_path.$scroller_bg_pattern.') repeat top left;';
	}
	if ( $scroller_bg_color ) {
		$wgcss .='
	background-color: '.$scroller_bg_color.';';
	}
$wgcss .='
}';

// slider bar background
$wgcss .= '
.wd-slider.ui-slider-horizontal {
	background-color: '.$slider_bar_bg_color.';
}';

// medium title
// background - hilighted text color (order nr or first word) - normal text color
$wgcss .= '
.wd-info-title {';
	if ( $medium_title_bg_pattern != -1) {
		$wgcss .='
	background: url('.$mod_assets_images_path.$medium_title_bg_pattern.') repeat top left;';
	}
	if ( $medium_title_bg_color ) {
		$wgcss .='
	background-color: '.$medium_title_bg_color.';';
	}
$wgcss .='
}';

// compute medium title width in title modes 0/1 (padding 4px)
$wgcss .= '
.wd-info-title h2 {
	width: '.($medium_img_width - $margin_medium - 8).'px;
    color:  '.$title_color.';
}';

// compute medium title width in title modes 2/4 (padding 4px, highlight nr/dropcase width 17px, 4px between highlight and title)
$wgcss .= '
.wd-info-title h2.wd-title {
	width: '.($medium_img_width - $margin_medium - 8 - 4 - 17).'px;
    color:  '.$title_color.';
}';

$wgcss .= '
.wd-element-medium .wd-highlight {
    color:  '.$title_hilite_color.';
}';

// hide title in medium if requested
if (!$medium_title_display) {
$wgcss .= '
.wd-element-medium .wd-info-title {
	display:none; 
}';
}

// medium image overlay
$wgcss .= '
.wd-element {
    width: '.$medium_img_width.'px; 
    height: '.$medium_img_height.'px; 
	}
.wd-element-medium {
	background: '.$medium_overlay_bg_color.' url('.$mod_assets_images_path.$medium_overlay_icon.') no-repeat center center;
}';

// x: item mode window overlay
$wgcss .= '
.wd-overlay {';
	if ( $item_overlay_bg_pattern != -1) {
		$wgcss .='
	background: url('.$mod_assets_images_path.$item_overlay_bg_pattern.') repeat top left;';
	}
	if ( $item_overlay_bg_color ) {
		$wgcss .='
	background-color: '.$item_overlay_bg_color.';';
	}
$wgcss .='
}';

// set popup dimensions and bg color

$wgcss .= '
.wd-overlay .wd-element {
    width: '.$popup_width.'px; 
    height: '.$popup_height.'px; 
	background-color: '.$popup_bg_color.';
}';

$wgcss .= '
.wd-overlay .wd-element .wd-info-title {
    left: '.($popup_width - $popup_title_total_width).'px;
    width: '.$popup_title_total_width.'px;
}';

// set popup title background to same color as popup background or same background as medium thumb title 
$wgcss .= '
.wd-overlay .wd-element .wd-info-title {';
	if ( $popup_title_bg_mode ) {
		$wgcss .='
	background: '.$medium_title_bg_color.';';
	} else {
		$wgcss .='
	background: '.$popup_bg_color.';';
	}
$wgcss .='
}';

// set popup title CSS
$wgcss .= '
.wd-overlay .wd-element .wd-info-title h2 {
	'.$popup_title_css.'
}';

// set title highlight
$wgcss .= '
.wd-overlay .wd-element span.wd-highlight {
    color:  '.$title_hilite_color.';
}';

// set popup description text CSS
$wgcss .= '
.wd-overlay .wd-element .wd-info-desc {
	'.$popup_description_css.'
}';
// set dropcap background to same color as popup background
/*
$wgcss .= '
.wd-overlay .wd-element h2.wd-highlight-dropcap {
	background-color: '.$popup_bg_color.';
}';
*/
// set item popup nav bars backgrounds
$wgcss .= '
.wd-nav span.wd-nav-next, .wd-nav span.wd-nav-prev {';
	if ( $popup_navbar_hover_bg_color ) {
		$wgcss .='
	background-color: '.$popup_navbar_hover_bg_color.';';
	} else {
		$wgcss .='
	background-color: '.$popup_bg_color.';';
	}
$wgcss .= '
}';

// insert style code in the header
$document =& JFactory::getDocument();
$document->addStyleDeclaration($wgcss);


?>
 <script id="fullscreenTmpl" type="text/x-jquery-tmpl">
	<div id="wd-overlay" class="wd-overlay">
		<div class="wd-element">
			<span class="wd-close">X fermer</span>
			<div class="wd-nav">
				<span class="wd-nav-next">Next</span>
				<span class="wd-nav-prev">Previous</span>
			</div>
			<img src="${source}" />
			<div class="wd-info">
				<div class="wd-info-title">
					{{html title}}
				</div>
				<div class="wd-info-desc">
					{{html description}}
				</div>
			</div>
		</div>
	</div>
</script>

		
<!-- wave slider content-->		
<?php if ($top_txt) { ?>
				<div class="wg-top-txt"><?php echo $top_txt; ?></div>
				<div class="wg-clearbox"></div>
<?php } ?>
			<div id="wd-wrapper" class="wd-wrapper">
				<div class="wd-slider"></div>
				<div class="wd-scroll-wrapper">
					<div class="wd-container">

<?php if(isset($list)){
	foreach( $list as $order => $row ){ ?>
		<div class="wd-element">
			<img src="<?php echo $row->mainImage; ?>" />		
			<div class="wd-info">
				<div class="wd-info-title">
				<?php switch ($title_display_mode) {
					case '3': // 3: add item order number with dropcap presentation
						$highlight = $order + 1; // item order
						$title = $row->title;
						?>
						<h2 class="wd-highlight-dropcap"><?php echo $highlight; ?></h2><h2 class="wd-title"><?php echo $title; ?></h2>
						<?php
						break;
					case '2': // 2: add item order number with highlight
						$highlight = $order +1 ; // item order
						$title = $row->title;
						?>
						<h2 class="wd-highlight-nr"><?php echo $highlight; ?></h2><h2 class="wd-title"><?php echo $title; ?></h2>
						<?php
						break;
					case '1': // 1: highlight first word
						$title = $row->title;
						$arr =  explode(" ", $title, 2);
						$highlight = $arr[0]; // first word
						$title = ($arr[1]) ? " ".$arr[1]   :$arr[1] ;
						?>
						<h2><span class="wd-highlight"><?php echo $highlight; ?></span><?php echo $title; ?></h2>
						<?php
						break;
					case '0': // 0: default - title only
					default:
						$title = $row->title;
						?>
						<h2><?php echo $title; ?></h2>
						<?php
						break;
				} ?>
				</div>
				<div class="wd-info-desc"><?php echo $row->description; ?></div>
			</div>
		</div>
	<?php };   
}; ?> 
                    </div>
                </div>
			</div>					
<?php if ($bottom_txt) { ?>
				<div class="wg-clearbox"></div>
				<div class="wg-bottom-txt"><?php echo $bottom_txt; ?></div>
<?php } ?>
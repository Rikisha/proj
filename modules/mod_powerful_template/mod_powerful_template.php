<?php
/**
* @Copyright Copyright (C) 2011- powerful_xml_template version for joomla 1.7 by Smallirons
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/

defined( '_JEXEC' ) or die( 'Restricted access' );
require_once (dirname(__FILE__).DS.'noimage_functions.php');

if (!function_exists('GetHColor')) {
function GetHColor($params, $tag_name, $curr_h_val = 'FFFFFF', $curr_h_sym = '#')
{
	$curr_pinput = $params->get($tag_name, $curr_h_sym . $curr_h_val);
	if (strtolower(substr($curr_pinput, 0, 2)) == '0x') {
		$curr_hex = substr($curr_pinput, 2);
	} elseif (substr($curr_pinput, 0, 1) == '#') {
		$curr_hex = substr($curr_pinput, 1);
	} else {
		$curr_hex = $curr_pinput;
	}
	if (strspn($curr_hex, "0123456789abcdefABCDEF") == 6 && strlen($curr_hex) == 6) {
		$curr_pinput = $curr_h_sym . $curr_hex;
	} else {
		$curr_pinput = $curr_h_sym . $curr_h_val;
	}
	return $curr_pinput;
}
}

$bannerWidth           = trim($params->get( 'bannerWidth', '100%' ));
$bannerHeight          = intval($params->get( 'bannerHeight', 350 ));
$backgroundColor       = GetHColor($params, 'backgroundColor', 'FFFFFF');
$wmode                 = trim($params->get( 'wmode', 'window' ));
$xml_fname    = trim($params->get( 'xml_fname', 'a' ));
$catppv_id = 'xml/' . $xml_fname;

$templatetype = 'index.swf';


$module_path = dirname(__FILE__).DS;
if (!is_dir($module_path . 'xml/')) {
	@mkdir($module_path . 'xml/', 0777);
}

$imgsrc        = trim($params->get('imgsrc', '' )); 
$imgsrc_arr    = explode("|",$imgsrc);

$imgdir        = trim($params->get('imgdir', '' )); 
$thumbdir        = trim($params->get('thumbdir', '' )); 

$imgdesc        = trim($params->get('imgdsc', '' )); 
$imgdsc_arr    = explode("|",$imgdesc);

$xml_data_data = '
<?xml version="1.0" encoding="UTF-8"?>';
$xml_data_data .= '
<settings>
 
  <!-- General and gallery setting -->
  <thumb_width>141</thumb_width>
  
  <thumb_height>110</thumb_height>
  
  <horizontal_space_between_thumbs>12</horizontal_space_between_thumbs>
  
  <vertical_space_between_thumbs>12</vertical_space_between_thumbs>
  
  <allow_thumb_zoom>yes</allow_thumb_zoom>
  
  <allow_to_maximize_image>yes</allow_to_maximize_image>
  
  <show_full_screen_button>yes</show_full_screen_button>
  
  <thumbs_overlay_shape_color>#000000</thumbs_overlay_shape_color>
   
  <buttons_icon_normal_color>#FFFFFF</buttons_icon_normal_color>
  
  <buttons_icon_selected_color>#000000</buttons_icon_selected_color>
  
  <buttons_background_normal_color>#000000</buttons_background_normal_color>
  
  <buttons_background_selected_color>#FFFFFF</buttons_background_selected_color>
  
  <zoom_icon_color>#FFFFFF</zoom_icon_color>
  
  <zoom_background_color>#000000</zoom_background_color>
  
  <thumb_outline_normal_color>#595959</thumb_outline_normal_color>
  
  <thumb_outline_selected_color>#FFFFFF</thumb_outline_selected_color>
  
  <thumb_media_icon_color>#FFFFFF</thumb_media_icon_color>
  
  <thumb_media_icon_background_color>#000000</thumb_media_icon_background_color>
  
  <thumb_background_color>#000000</thumb_background_color>
  
  <preloader_color>#FFFFFF</preloader_color>
  
    
   
  
 <!------------ ADD / REMOVE IMAGES FROM THE GALLERY ------------>
  <items>
  


';
$xml_data_data .= '';

////////// start : noimage code //////////////

$exist_url = JURI::root();
$server_path = getCurUrl($exist_url);
//////////////////////////////////////////


foreach ($imgsrc_arr as $ik=>$curr_isrc) {
	$xml_data_data .= '<item>';

if (false === strpos($curr_isrc, '://')) {
$xml_data_data .= '<thumb_path>' . trim($server_path.$thumbdir) . '/' . trim($curr_isrc) . '</thumb_path>';
$xml_data_data  .= "\n";
$xml_data_data .= '<media_path>' . trim($server_path.$imgdir) . '/' . trim($curr_isrc) . '</media_path>';
$xml_data_data  .= "\n";
}else{
$xml_data_data .= '<thumb_path>' . trim($curr_isrc) . '</thumb_path>';
$xml_data_data  .= "\n";
$xml_data_data .= '<media_path>' . trim($curr_isrc) . '</media_path>';
$xml_data_data  .= "\n";
}



if ($params->get('show_desc', 'yes') == 'yes') {
$xml_data_data .= '<description><![CDATA['.trim($imgdsc_arr[$ik]).']]></description>';
$xml_data_data  .= "\n";
}else{
$xml_data_data .= '<description><![CDATA[]]></description>';
$xml_data_data  .= "\n";
}



$xml_data_data .= '
           </item>';

/////////////////// END ////////////////////////////
}

$xml_data_data .= '
</items>';
$xml_data_data  .= "\n";
$xml_data_data .= '
</settings>

';

$catppv_id .= md5($xml_data_data);

if (!file_exists($module_path . $catppv_id . '.swf')) {
	copy($module_path . $templatetype, $module_path . $catppv_id . '.swf');

	///////// set chmod 0644 for creating .swf file  if server is not windows
	$os_string = php_uname('s');
	$cnt = substr_count($os_string, 'Windows');
	if($cnt ==0){
		@chmod($module_path . $catppv_id . '.swf', 0644);
	}

}
$xml_data_filename = $module_path.$catppv_id.'.xml';
if (!file_exists($xml_data_filename)) {
	$xml_prodgallery_file = fopen($xml_data_filename,'w');
	fwrite($xml_prodgallery_file, $xml_data_data);

	///////// set chmod 0777 for creating .xml file  if server is not windows
	$os_string = php_uname('s');
	$cnt = substr_count($os_string, 'Windows');
	if($cnt ==0){
		@chmod($xml_data_filename, 0777);
	}

	fclose($xml_prodgallery_file);
}
$exist_url = JURI::root();
$server_path = getCurUrl($exist_url);
?>



<div id="powerfulmodcontent" style="background-color:#111111;">

	
	<object id="_slideshowBoxEmbed792293" width="<?php echo $bannerWidth; ?>" height="<?php echo $bannerHeight; ?>" type="application/x-shockwave-flash" data="<?php echo $server_path?>modules/mod_powerful_template/<?php echo $catppv_id; ?>.swf">
	<param name="movie" value="<?php echo $server_path?>modules/mod_powerful_template/<?php echo $catppv_id; ?>.swf" /><param name="allowFullScreen" value="true" />
	<param name="wmode" value="transparent" />
	<param name="flashvars" value="xml_path=<?php echo $server_path?>modules/mod_powerful_template/<?php echo $catppv_id; ?>.xml" />
	</object>
</div>
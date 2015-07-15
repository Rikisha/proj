<?php 

/*******************************************************************************************/
/*		Creative Commons License
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*
/*******************************************************************************************/


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// General Body Parameters
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Body patterns and colors

$body_bgpattern = 'black';
$body_bgcolor = 'F4F4F4';
$body_bordercolor = 'CCCCCC';
$body_borderinnercolor = 'FFFFFF';
$body_formbgcolor = 'FFFFFF';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Body Fonts

$body_fontsize = '12px';
$body_fontstyle = 'normal';
$body_fontweight = 'normal';
$body_fontfamily = 'Tahoma, Arial, Geneva, Verdana, sans-serif';
$body_fontcolor = '3F3C38';
$body_hfontsize = '15px';
$body_hfontweight = 'bold';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Body Links & Buttons

$body_errormsgcolor = '990000';
$body_hwordcolor = $body_errormsgcolor;
$body_linkcolor = '3F3C38';
$body_linkcolorhover = '990000';
$body_btn_bgcolor = '000000';
$body_btn_bgcolorhover = '990000';
$body_btn_fontcolor = 'FFFFFF';
$body_btn_fontcolorhover = 'FFFFFF';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header parameters
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header - Row 1 Parameters (Top navigation bar)
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$header_row1_bgcolor = '000000';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$topnavbar_position = 'right';
$topnavbar_linkcolor = 'FFFFFF';
$topnavbar_linkcolorhover = '990000';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$linkimg_home = $this->baseurl . '/templates/' . $this->template . '/images/themes/' . $body_bgpattern . '/btn.home.png';
$linkimg_contact = $this->baseurl . '/templates/' . $this->template . '/images/themes/' . $body_bgpattern . '/btn.contact.png';
$linkimg_search = $this->baseurl . '/templates/' . $this->template . '/images/themes/' . $body_bgpattern . '/btn.search.png';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header - Row 2 Parameters (Logo & Top Menu )
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$header_row2_bgcolor = '000000';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header - Row 2 (Top Menu)

$topmenu_parentmark = $this->baseurl . '/templates/' . $this->template . '/images/themes/' . $body_bgpattern . '/mark.parent.png';
$topmenu_linkcolor = 'FFFFFF';
$topmenu_linkcolorhover = '000000';
$topmenu_btn_bgcolor = '990000';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header - Row 2 (Logo)

$logo_type = '0';
$logo_bgcolor = '';
$logo_img = $this->baseurl . '/templates/' . $this->template . '/images/themes/' . $body_bgpattern . '/companyname.png';
$logo_position = "left";
$logo_align = "left";
$logo_showbgimg = 1;
$logo_bgimg = $this->baseurl . '/templates/' . $this->template . '/images/bg.companyname.png';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$logo_txt = '';
$logo_txtfontsize = '27px';
$logo_txtfontstyle = 'normal';
$logo_txtfontweight = 'bold';
$logo_txtfontfamily = $body_fontfamily;
$logo_txtcolor = 'FFFFFF';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header - Row 2 (Slogan)

$slogan_txt = '';
$slogan_txtfontsize = '10px';
$slogan_txtfontstyle = 'normal';
$slogan_txtfontweight = 'normal';
$slogan_txtfontfamily = $body_fontfamily;
$slogan_txtcolor = 'FFFFFF';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header - Row 3 Parameters (Slider)
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$header_row3_bgcolor = $body_bgcolor;

include 'params.slider.php';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Header - Row 4 Parameters (Breadcrumbs & Search)
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$header_row4_bgcolor = $body_bgcolor;
$header_row4_bgcontentcolor = '000000';
$header_row4_fontcolor = 'FFFFFF';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$search_bgcolor = '282828';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Left & Right Column Parameters
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$leftcolumn = 0;
$leftcolumn += (bool) $this->countModules('position-40');
$leftcolumn += (bool) $this->countModules('position-41');

$rightcolumn = 0;

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$sidecolumn_hfontcolor = $body_fontcolor;
$sidecolumn_hfontsize = '17px';
$sidecolumn_hfontweight = 'normal';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$sidecolumn_btn_bgcolor = '990000';
$sidecolumn_btn_bgcolorhover = '000000';


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Main column parameters
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// Separator between Header and Content

$content_separator = 20;

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Main Column - Dimensions

$maincolumn_width = 'style="width:1002px"';
$maincolumn_cntwidth = 'style="width:1000px"';

if ($leftcolumn)
{
	$maincolumn_width = 'style="width:732px"';
	$maincolumn_cntwidth = 'style="width:730px"';
}
				 
				 					 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Footer
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$footer_fontcolor = 'FFFFFF';

$footer_hfontsize = '15';
$footer_hfontweight = 'bold';
$footer_hfontcolor = 'FFFFFF';

$footer_linkcolor = 'FFFFFF'; 
$footer_linkcolorhover = '990000';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$footer_listimg =  $this->baseurl . '/templates/' . $this->template . '/images/themes/' . $body_bgpattern . '/listimg.footer.png';
$footer_listimghover =  $this->baseurl . '/templates/' . $this->template . '/images/themes/' . $body_bgpattern . '/listimg.footer.hover.png';

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Footer - Row 2


$footer_row2_bgcolor = '000000';


?>

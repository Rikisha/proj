<style type="text/css">

/*******************************************************************************************/
/*		Creative Commons License
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*
/**************************************************************************************/

/**************************************************************************************/
/**************************************************************************************/
/*   Elements
/**************************************************************************************/
/**************************************************************************************/


body
{
	font-family: <?php echo $body_fontfamily; ?>;
	font-size: <?php echo $body_fontsize; ?>;
	font-style: <?php echo $body_fontstyle; ?>;
	font-weight: <?php echo $body_fontweight; ?>;
	background-color: #<?php echo $body_bgcolor; ?>;
	color: #<?php echo $body_fontcolor; ?>;
}

h1, 
h2, 
h3
{
	color: <?php echo $body_fontcolor; ?>;
	font-size: <?php echo $body_hfontsize; ?>;
	font-weight: <?php echo $body_hfontweight; ?>;
}

a
{
	color: #<?php echo $body_linkcolor; ?>;
}

a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

input
{
	color: #<?php echo $body_fontcolor; ?>;
	border-color: #<?php echo $body_bordercolor; ?>;
	background-color: #<?php echo $body_formbgcolor; ?>;
}

option
{
	background-color: #<?php echo $body_formbgcolor; ?>;
}

select
{
	color: #<?php echo $body_fontcolor; ?>;
	border-color: #<?php echo $body_bordercolor; ?>;
	background-color: #<?php echo  $body_formbgcolor; ?>;
}

textarea,
.CodeMirror-wrapping
{
	color: #<?php echo $body_fontcolor; ?>;
	border-color: #<?php echo $body_bordercolor; ?>;
	background-color: #<?php echo $body_formbgcolor; ?>;
}


/**************************************************************************************/
/*   Header
/**************************************************************************************/
/**************************************************************************************/


/**************************************************************************************/
/*   Header Row 1 - topnavbar	  														  */

#header .row1
{
	background-color: #<?php echo $header_row1_bgcolor; ?>;
	border-bottom: 1px solid #<?php echo $body_bgcolor; ?>;
}

#header .row1 #topnavbar .menu,
#header .row1 #topnavbar .custom
{
	float: <?php echo $topnavbar_position; ?>;
}

#header .row1 #topnavbar a
{
	color: #<?php echo $topnavbar_linkcolor; ?>;
}

#header .row1 #topnavbar a:hover
{
	color: #<?php echo $topnavbar_linkcolorhover; ?>;
}

#header .row1 #topnavbar .custom #homelink a
{
	background-image: url(<?php echo $linkimg_home; ?>);
	background-repeat: no-repeat;
	background-position: bottom;	
}

#header .row1 #topnavbar .custom #homelink a:hover
{
	background-position: top;	
}

#header .row1 #topnavbar .custom #contactlink a
{
	background-image: url(<?php echo $linkimg_contact; ?>);
	background-repeat: no-repeat;
	background-position: bottom;	
}

#header .row1 #topnavbar .custom #contactlink a:hover
{
	background-position: top;	
}

#header .row1 #topnavbar .custom #searchlink a
{
	background-image: url(<?php echo $linkimg_search; ?>);
	background-repeat: no-repeat;
	background-position: bottom;			
}

#header .row1 #topnavbar .custom #searchlink a:hover
{
	background-position: top;	
}


/**************************************************************************************/
/*   Header Row 2 - Logo & Top Menu 												  */

#header .row2
{
	color: #FFFFFF;
	background-color: #<?php echo $header_row2_bgcolor; ?>;
	border: 1px;
	border-bottom-color: #<?php echo $body_bgcolor; ?>;
	border-bottom-style: solid;
}

#header .row2 #companyname
{
	background-image: url(<?php echo $logo_bgimg; ?>);
	background-position: <?php echo $logo_position; ?>;
	background-repeat: no-repeat;
	text-align: <?php echo $logo_align; ?>;
}

#header .row2 #companyname,
#header .row2 #companyname a
{
	font-family: <?php echo $logo_txtfontfamily; ?>;
    font-size: <?php echo $logo_txtfontsize; ?>;
    font-style: <?php echo $logo_txtfontstyle; ?>;
    font-weight: <?php echo $logo_txtfontweight; ?>;
	text-align: <?php echo $logo_align; ?>;
	color: #<?php echo $logo_txtcolor; ?>;
}

#header .row2 #companyname a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

#header .row2 .slogan
{
	font-family: <?php echo $slogan_txtfontfamily; ?>;
    font-size: <?php echo $slogan_txtfontsize; ?>;
    font-style: <?php echo $slogan_txtfontstyle; ?>;
    font-weight: <?php echo $slogan_txtfontweight; ?>;
	color: #<?php echo $slogan_txtcolor; ?>;
}

#header .row2 #topmenu ul.menu li
{
}

#header .row2 #topmenu ul.menu li a,
#header .row2 #topmenu ul.menu ul li a 
{
	color: #<?php echo $topmenu_linkcolor; ?>;
}

#header .row2 #topmenu ul.menu li.current a,
#header .row2 #topmenu ul.menu li.active a,
#header .row2 #topmenu ul.menu li.actives a,
#header .row2 #topmenu ul.menu li.current a:hover,
#header .row2 #topmenu ul.menu li.active a:hover,
#header .row2 #topmenu ul.menu li.actives a:hover,
#header .row2 #topmenu ul.menu li a:hover
{
	background-color: #<?php echo $topmenu_btn_bgcolor; ?>;
	color: #<?php echo $topmenu_linkcolor; ?>;
	-moz-border-radius: 3px;
	border-radius: 3px;		
}

/**************************************************************************************/
/*  Header Row 4 - Breadcrums & Search			  									  */

#header .row4 .content
{
	color: #<?php echo $header_row4_fontcolor; ?>;
	background-color: #<?php echo $header_row4_bgcontentcolor; ?>;
}

#header #breadcrumb
{
}

#header #breadcrumb a
{
	color: #<?php echo $header_row4_fontcolor; ?>;
}

#header #breadcrumb a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

#header #search .inputbox
{
	color: #<?php echo $header_row4_fontcolor; ?>;
	background-color: #<?php echo $search_bgcolor; ?>;
	-moz-border-radius: 3px;
	border-radius: 3px;		
}

/**************************************************************************************/
/**************************************************************************************/
/*   Content
/**************************************************************************************/
/**************************************************************************************/

#content
{
	padding-top: <?php echo $content_separator; ?>px;	
}

/**************************************************************************************/
/*   Column Left & Right
/**************************************************************************************/
/**************************************************************************************/

#colleft
{
}

#colleft h1, 
#colleft h2, 
#colleft h3
{
	color: #<?php echo $sidecolumn_hfontcolor; ?>;
	font-size: <?php echo $sidecolumn_hfontsize; ?>;
	font-weight: <?php echo $sidecolumn_hfontweight; ?>;
}

#colleft a
{
	color: #<?php echo $body_fontcolor; ?>;
}

#colleft a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}
	
#colleft ul li a,
#colleft ul li.active ul li a
{
	color: #<?php echo $body_fontcolor; ?>;
	background-image: url(<?php echo $this->baseurl . '/templates/' . $this->template . '/images/sep.hor.png' ?>);	
	background-position: left bottom;
	background-repeat: repeat-x;	
}

#colleft ul li a:hover,
#colleft ul li.active a,
#colleft ul li.active ul li a:hover,
#colleft ul ul li a:hover  
{
    color: #<?php echo $body_btn_fontcolor; ?>;
	background-image: url(<?php echo $this->baseurl . '/templates/' . $this->template . '/images/bg.li.hover.left.png' ?>);
	background-position: left bottom;
	background-repeat: no-repeat;
}

#colleft img
{
	border: 1px solid #<?php echo $body_bordercolor; ?>;
}

#colleft button, 
#colleft .button
{
	background-color: #<?php echo $sidecolumn_btn_bgcolor; ?>;
	-moz-border-radius: 3px;
	border-radius: 3px;	
	color: #<?php echo $body_btn_fontcolor; ?>;
}

#colleft button:hover, 
#colleft .button:hover
{
	background-color: #<?php echo $sidecolumn_btn_bgcolorhover; ?>;
	color: #<?php echo $body_btn_fontcolor; ?>;
}

#colleft input
{
	font-family: <?php echo $body_fontfamily; ?>;
}


#colleft .readmore
{
	background-color: #<?php echo $sidecolumn_btn_bgcolor; ?>;
	-moz-border-radius: 3px;
	border-radius: 3px;
	background-image: none;	
}

#colleft .readmore:hover
{
	background-color: #<?php echo $sidecolumn_btn_bgcolorhover; ?>;
}

#colleft .readmore a
{
	color: #<?php echo $body_btn_fontcolor; ?>;
}


/**************************************************************************************/
/*   Column Main 
/**************************************************************************************/
/**************************************************************************************/

#colmain
{
}

#colmain #component
{
	background-color: #<?php echo $body_bgcolor; ?>;
}

#colmain #component .innerborder
{
	border: 1px solid #<?php echo $body_borderinnercolor; ?>;
}

#colmain .blog-featured,
#colmain .item-page,
#colmain .contact,
#colmain .registration,
#colmain .reset,
#colmain .remind,
#colmain .profile,
#colmain .edit,
#colmain .search-results,
#colmain .categories-list
{
	background-color: transparent;
}

#colmain h1, 
#colmain h2, 
#colmain h3
{
	color: <?php echo $body_fontcolor; ?>;
	font-size: <?php echo $body_hfontsize; ?>;
	font-weight: <?php echo $body_hfontweight; ?>;
}

#colmain h1 a, 
#colmain h2 a, 
#colmain h3 a
{
	color: #3F3C38;
}

#colmain h1 a:hover, 
#colmain h2 a:hover, 
#colmain h3 a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

#colmain a
{
	color: #<?php echo $body_linkcolor; ?>;
}

#colmain a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

#colmain li  
{
}

#colmain input,
#colmain textarea
{
	font-family: <?php echo $body_fontfamily; ?>;
	background-color: #<?php echo $body_formbgcolor; ?>;
}

#colmain input[type="checkbox"],
#colmain input[type="radio"]
{
	background-color: transparent !important!
}

#colmain p
{
	color: #<?php echo $body_fontcolor; ?>;
}

#colmain .blog-featured .readmore,
#colmain .blog .readmore
{
	background-color: #<?php echo $body_btn_bgcolor; ?>;
	-moz-border-radius: 3px;
	border-radius: 3px;	
}

#colmain .blog-featured .readmore:hover,
#colmain .blog .readmore:hover
{
	background-color: #<?php echo $body_btn_bgcolorhover; ?>;
	-moz-border-radius: 3px;
	border-radius: 3px;	
}

#colmain .blog-featured .readmore a,
#colmain .blog .readmore a
{
	color: #<?php echo $body_btn_fontcolor; ?>;	
}

#colmain .blog-featured .readmore a:hover,
#colmain .blog .readmore a:hover
{
	color: #<?php echo $body_btn_fontcolorhover; ?>;
} 

#colmain .readmore:hover
{
}

#colmain .readmore a
{
	color: #<?php echo $body_linkcolor; ?>;
}

#colmain .readmore a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

#colmain .readmore button,
#colmain .readmore .button
{
	color: #<?php echo $body_linkcolor; ?>;
}

#colmain .readmore button:hover, 
#colmain .readmore .button:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

#colmain button, 
#colmain .button
{
	background-color: #<?php echo $body_btn_bgcolor; ?>;
	-moz-border-radius: 3px;
	border-radius: 3px;	
	color: #<?php echo $body_btn_fontcolor; ?>;
}

#colmain button:hover, 
#colmain .button:hover
{
	background-color: #<?php echo $body_btn_bgcolorhover; ?>;
	color: #<?php echo $body_btn_fontcolorhover; ?>;
}
	
#colmain #adsense
{
	border-top: 1px solid #<?php echo $body_bordercolor; ?>;
	border-bottom: 1px solid #<?php echo $body_bordercolor; ?>;
}

#colmain #adsense .innerborder
{
	border-top: 1px solid #<?php echo $body_borderinnercolor; ?>;
	border-bottom: 1px solid #<?php echo $body_borderinnercolor; ?>;
}

#colmain .inputbox,
#colmain #jform_name,
#colmain #jform_username,
#colmain #jform_password1,
#colmain #jform_password2,
#colmain #jform_email,
#colmain #jform_email1,
#colmain #jform_email2,
#colmain #jform_title,
#colmain #jform_url,
#colmain #jform_catid,
#colmain #jform_state,
#colmain #jform_params_editor,
#colmain #jform_params_timezone,
#colmain #jform_params_language,
#colmain #jform_params_admin_style,
#colmain #jform_params_admin_language,
#colmain #jform_params_helpsite,
#colmain #username,
#colmain #password
{
	border-color: #<?php echo $body_bordercolor; ?>;
	background-color: #<?php echo $body_formbgcolor; ?>;
}

#colmain #editor-xtd-buttons .button2-left .readmore a
{
	color: #<?php echo $body_fontcolor; ?>;
}

#colmain #member-registration fieldset,
#colmain #member-profile fieldset,
#colmain #adminForm fieldset,
#colmain .registration fieldset,
#colmain .profile fieldset
{
}

#colmain #users-profile-core legend,
#colmain #users-profile-custom legend,
#colmain #adminForm legend,
#colmain .profile-edit legend,
#colmain .registration legend
{
}

#colmain span.spacer > span.text label 
{
	color: #<?php echo $body_fontcolor; ?>;
}

#colmain #searchForm .phrases,
#colmain #searchForm .only
{
	border-color: #<?php echo $body_bordercolor; ?>;
}

#colmain #jform_spacer-lbl,
#colmain label.invalid,
#colmain .red,
#colmain .star,
#colmain .asterisk
{
	color: #<?php echo $body_errormsgcolor; ?>;
}


/**************************************************************************************/
/*   Footer
/**************************************************************************************/
/**************************************************************************************/

#footer
{
	color: #<?php echo $footer_fontcolor; ?>;
}

#footer h1, 
#footer h2, 
#footer h3
{
	color: #<?php echo $footer_hfontcolor; ?>;
	font-size: <?php echo $footer_hfontsize; ?>;
	font-weight: <?php echo $footer_hfontweight; ?>;		
}

#footer p,
#footer #footertrademark
{
	color: #<?php echo $footer_fontcolor; ?>;
}

#footer a,
#footer #footermenu li a
{
	color: #<?php echo $footer_linkcolor; ?>;	
}

#footer a:hover
{
	color: #<?php echo $footer_linkcolorhover; ?>;	
}

#footer li,
#footer .menu li
{
	background-image: url(<?php echo $footer_listimg; ?>);
	background-repeat: no-repeat;
	background-position: left center;
}

#footer li:hover,
#footer .menu li:hover
{
	background-image: url(<?php echo $footer_listimghover; ?>);
	color: #<?php echo $footer_linkcolorhover; ?>;	
}


/**************************************************************************************/
/*   Footer Row 2			   																  */

#footer .row2
{
	background-color: #<?php echo $footer_row2_bgcolor; ?>;
}


/**************************************************************************************/
/**************************************************************************************/
/*   General Element IDs and classes
/**************************************************************************************/
/**************************************************************************************/


.moduletable_menu li a:hover
{
	color: #<?php echo $body_linkcolorhover; ?>;
}

.hword
{
	color: #<?php echo $body_hwordcolor; ?>;
}

</style>
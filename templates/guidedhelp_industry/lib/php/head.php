<?php
/**
* Description : The following source code is a modified version of the original template "City Sky" from Yagendoo.com

* Version Info :  Version 3.0 - Modified Version:-
* @modified by: GuidedHelp.net
* @modification date: September 2011
* @url: http://www.guidedhelp.com
* @license: GNU/GPL
* @product: guidedhelp_industry
* @version: 3.0

* Version Info :  Version 1.0 - Original Author:-

* @Enterprise: S&S Media Solutions
* @author: Yannick Spang
* @creation date: August 2009
* @url: http://www.yagendoo.com
* @copyright: Copyright (C) 2008 - 2009 S&S Media Solutions
* @license: GNU/GPL
* @product: City Sky - Template
* @version: 1.0
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/guidedhelp_industry/css/template_default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/guidedhelp_industry/css/joomla.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>
<script src="templates/guidedhelp_industry/js/jquery-1.3.2.min.js" language="javascript" type="text/javascript"></script>
<script src="templates/guidedhelp_industry/js/equalheights.js" language="javascript" type="text/javascript"></script>
<!--[if lte IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php if($this->params->get("ie6info", 1) == 1): ?>
<!--[if IE 6]>
<script type="text/javascript"> 
	/*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; } 
	var IE6UPDATE_OPTIONS = {
		icons_path: "<?php echo $this->baseurl ?>/templates/guidedhelp_industry/lib/ie6update/images/"
	}
</script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/guidedhelp_industry/lib/ie6update/ie6update.js"></script>
<![endif]-->
<?php endif; ?>
<?php $this->setGenerator('A GuidedHelp.net Joomla Template'); ?>
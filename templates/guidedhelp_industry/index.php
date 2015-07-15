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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<jdoc:include type="head" />
	<?php include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/head.php');?>	
<script type="text/javascript">
$(document).ready(function(){ 
	$("#equalheight").equalheight();
});

</script>
<script type="text/javascript">
$(document).ready(function(){ 
	$("#equalheight2").equalheight();
});
</script>


<?php
/** Bottom3Modules_A module expand/collapse settings */
if($this->countModules('Bottom3Modules_B and Bottom3Modules_C') == 0) $Bottom3Modules_Awidth = "100"; 
if($this->countModules('Bottom3Modules_B or Bottom3Modules_C') == 1) $Bottom3Modules_Awidth = "66"; 
if($this->countModules('Bottom3Modules_B and Bottom3Modules_C') == 1) $Bottom3Modules_Awidth = "33"; 

/** Bottom3Modules_B module expand/collapse settings */
if($this->countModules('Bottom3Modules_A and Bottom3Modules_C') == 0) $Bottom3Modules_Bwidth = "100"; 
if($this->countModules('Bottom3Modules_A') == 1) $Bottom3Modules_Bwidth = "30"; 
if($this->countModules('Bottom3Modules_C') == 1) $Bottom3Modules_Bwidth = "66"; 
if($this->countModules('Bottom3Modules_A and Bottom3Modules_C') == 1) $Bottom3Modules_Bwidth = "33"; 

/**  Bottom3Modules_C module expand/collapse settings */
if($this->countModules('Bottom3Modules_A and Bottom3Modules_B') == 0) $Bottom3Modules_Cwidth = "100"; 
if($this->countModules('Bottom3Modules_A or Bottom3Modules_B') == 1) $Bottom3Modules_Cwidth = "33"; 
if($this->countModules('Bottom3Modules_A and Bottom3Modules_B') == 1) $Bottom3Modules_Cwidth = "33"; 
?> 
</head>
<body class="background_style">
	<div id="guidedhelp_wrapper_all">
		<div id="guidedhelp_top">
			<div id="topmenu">
			<div id="whatson"></div>
				<jdoc:include type="modules" name="TopMenu" style="none" />
				<div id="search"><jdoc:include type="modules" name="search" style="none" /></div>
			</div>
			<div id="logo_<?php echo $this->params->get('logoplaceholder'); ?>"><jdoc:include type="modules" name="TopLogo" style="none" /></div>
			<div id="guidedhelp_nav">
			<jdoc:include type="modules" name="TopMainMenu_AboveBanner" style="rounded" />
		</div>
			</div>
		<div id="guidedhelp_header_<?php echo $this->params->get('headerplaceholder'); ?>">
        				<jdoc:include type="modules" name="TopHeader" style="none" />
		        	</div>
					<div class="guidedhelp_clear "></div>
		<div id="equalheight" class="maincontentcontainer">
		<?php if ($this->countModules('left')) { $guidedhelpsuffix = "-moduleon"; } else { $guidedhelpsuffix="";	} ?>
		<div id="maincontent">
		<?php if($this->countModules('TopAdLinks_LightTheme')) : ?>
			<div id="TopAdLinks">
				<jdoc:include type="modules" name="TopAdLinks_LightTheme" style="xhtml" />
			</div>
		<?php endif; ?>
		<?php if($this->countModules('Breadcrumb')) : ?>
			<jdoc:include type="modules" name="Breadcrumb" style="xhtml"/>
		<?php endif; ?>  
		<?php if($this->countModules('MainContentAreaTop')) : ?>
		<div id="contenttop">
			<jdoc:include type="modules" name="MainContentAreaTop" style="xhtml"/>
		</div>
		<?php endif; ?> 		
		<jdoc:include type="component" />
		<?php if($this->countModules('MainContentAreaBottom')) : ?>
		<div id="contentbottom">
			<jdoc:include type="modules" name="MainContentAreaBottom" style="xhtml"/>
		</div>
		<?php endif; ?>
		<?php if($this->countModules('ContentAds_LightTheme')) : ?>
		<div id="ContentAds">
			<jdoc:include type="modules" name="ContentAds_LightTheme" style="xhtml"/>
		</div>
		<?php endif; ?>
		</div>
		<?php if($this->countModules('left')) : ?>
				<div id="sidebar">
    				<jdoc:include type="modules" name="left" style="xhtml"/>
		    	</div>
			<?php endif; ?>
			</div>
			<div class="guidedhelp_clear "></div>
		<div id="guidedhelp_footer">
		<?php if($this->countModules('FooterSide or FooterMain')) : ?>
		<div id="BottomFooter">
			<div id="FooterSide">
			<jdoc:include type="modules" name="FooterSide" style="xhtml"/>
			</div>
			<div id="FooterMain">
			<jdoc:include type="modules" name="FooterMain" style="xhtml"/>
			</div>
		</div>
		<div class="guidedhelp_clear "></div>
		<?php endif; ?>
		<?php if($this->countModules('FooterModule1 or FooterModule2 or FooterModule3')) : ?>
	<div id="FooterModules">
		<div id="FooterModule1">
			<jdoc:include type="modules" name="FooterModule1" style="xhtml"/>
		</div>
		<div id="FooterModule2">
			<jdoc:include type="modules" name="FooterModule2" style="xhtml"/>
		</div>
		<div id="FooterModule3">
			<jdoc:include type="modules" name="FooterModule3" style="xhtml"/>
		</div>
	</div>
<?php endif; ?>
		<div id="footermenu">
		<jdoc:include type="modules" name="TopMenu" style="none" />
		</div>
			<div id="guidedhelp_links">
				<jdoc:include type="modules" name="footer" style="rounded"/>
			</div>
			<div id="guidedhelpicon"></div>
		<?php 
		/** 
		This is another Free Template from GuidedHelp.net. As you are using it for free, please do not remove the 'Powered by GuidedHelp Websites' credit.
		*/?>
			<div id="guidedhelp_credits">
			Powered by <a name="GuidedHelp" href="http://www.guidedhelp.net">GuidedHelp</a> Websites
			</div>
		</div>
	</div>
</body>
</html>
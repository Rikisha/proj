<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	
	<jdoc:include type="head" />
	
	<?php		 JHtml::_('behavior.framework', true);
	$app = JFactory::getApplication(); 
	$app = JFactory::getApplication(); 
	$csite_name	= $app->getCfg('sitename'); ?>

    <?php 
    $caption1 = $this->params->get("caption1", "Every time we embrace, i go to that away place...");
    $caption2 = $this->params->get("caption2", "Whenever i look into your eyes..");
    $caption3 = $this->params->get("caption3", "You are always on my mind...");
	$newsflash = $this->params->get("newsflash", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed leo eros, pharetra ac lacinia quis, ultricies ac dolor. Etiam
	elementum commodo nibh id volutpat. Nam interdum, ante a eleifend dignissim, ante enim eleifend nisi, ac varius ligula sem, vitae risus. Nulla facilisi. 
	Nulla luctus libero ut orci semper ultricies. Mauris eget lacus vel diam placerat luctus. Nulla ut lacus ut  ");
    ?>
	
	<?php          
    $mod_right = $this->countModules( 'position-7' );        
    if ( $mod_right ) { $width = '';        
    } else { $width = '-full';}        
    ?>		
	
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/defaut.css" type="text/css" /> 
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/box.css" type="text/css" /> 
	<script type="text/javascript" src="templates/<?php echo $this->template ?>/js/mootools.js"></script>
	<script type="text/javascript" src="templates/<?php echo $this->template ?>/js/script.js"></script>
	<script type="text/javascript" src="templates/<?php echo $this->template ?>/js/jquery.js"></script>        
	<script type="text/javascript" src="templates/<?php echo $this->template ?>/js/superfish.js"></script>  
	<script type="text/javascript" src="templates/<?php echo $this->template ?>/js/hover.js"></script> 
    <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/cufon-yui.js"></script>
    <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/cufon-replace.js"></script>
    <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/Oswald_400.font.js"></script>
	<script type="text/javascript" src="templates/<?php echo $this->template ?>/js/nivo.slider.js"></script>
	
	<script type="text/javascript">
    window.addEvent('domready', function() {
    SqueezeBox.initialize({});
    $$('a.modal').each(function(el) {
    el.addEvent('click', function(e) {
    new Event(e).stop();
    SqueezeBox.fromElement(el);
     }); }); });
    </script>

	
	
	<script type="text/javascript"> 
     var $j = jQuery.noConflict(); 
	$j(document).ready(function() {	    
	$j('.navigation ul').superfish({		  
	delay:       800,                            		 
	animation:   {opacity:'show',height:'show'},  		  
	speed:       'normal',                          		 
	autoArrows:  false,                           		  
	dropShadows: true                           	  
	});	   }); 
	</script>
	
   <script type="text/javascript"> 
   var $j = jQuery.noConflict(); 
   jQuery(document).ready(function ($){
    $j("#slider").nivoSlider(
    {effect: "sliceUpDown",
    slices: 15,
    boxCols: 8,
    boxRows: 4,
    animSpeed: 1000,
    pauseTime: 3000,
    captionOpacity: 1
     }); });
    </script>
	
	</head>
	<body>    
	    <div class="pagewidth">	               
	        <div id="sitename">				    	             	   				            
	            <a href="index.php"><img src="templates/<?php echo $this->template ?>/images/logo.png" width="198" height="66" alt="logotype" /></a>				            		           
	        </div>		    
	            <div id="topmenu">		                                    
	                <div class="navigation">                                                    
	                    <jdoc:include type="modules" name="position-1" />                                            
	                </div>			                        
	            </div>
				    <div id="slide-top"></div>
                        <div id ="slide">
					           <div id="slider" class="nivoSlider"> 
					            <img src="templates/<?php echo $this->template ?>/images/slide1.jpg" alt="image1" title="<?php echo $caption1 ?>" />
						        <img src="templates/<?php echo $this->template ?>/images/slide2.jpg" alt="image1" title="<?php echo $caption2 ?>" />
						        <img src="templates/<?php echo $this->template ?>/images/slide3.jpg" alt="image1" title="<?php echo $caption3 ?>" />
					        </div>
							    <div id="newsflash"><p><?php echo $newsflash ?></p></div>
					    </div>
					        <div id="tool">	
		                        <div id="toolitem">
				                    <div id="loginbt">
                                        <div class="text-login">	
						                    <a href="#helpdiv" class="modal"  style="cursor:pointer" title="Login"  rel="{size: {x: 206, y: 285}, ajaxOptions: {method: &quot;get&quot;}}">
                                                <img src="templates/<?php echo $this->template ?>/images/login.png" width="98" height="98"  alt="login" />
						                    </a>
					                    </div>
                                     </div>
                                        <div style="display:none;">
                                            <div id="helpdiv" >
                                                <jdoc:include type="modules" name="login" style="xhtml" />
                                            </div>
                                        </div>
					
					                        <div id="search">
                                                <div  class="text-login">	
						                            <a href="#helpdiv2" class="modal"  style="cursor:pointer" title="search"  rel="{size: {x: 206, y: 50}, ajaxOptions: {method: &quot;get&quot;}}">
                                                        <img src="templates/<?php echo $this->template ?>/images/search.png" width="98" height="98"  alt="search" />       
							                        </a>
					                            </div>
                                            </div>
                                                <div style="display:none;">
                                                    <div id="helpdiv2" >
                                                        <jdoc:include type="modules" name="position-0" />
                                                    </div>
                                                </div>
			                        </div>
		                    </div>
							    <div class="wrapper">
								    <div id="main<?php echo $width ?>">				                        
                                        <jdoc:include type="component" />			                        
                                    </div>																		
                                        <?php if ($this->countModules('position-7')) { ?>
                                            <div id="colonne">	                                    
                                                <div id="right">	                                        
                                                    <jdoc:include type="modules" name="position-7" style="xhtml" />	                                    
                                                </div>
                                            </div>												
                                        <?php } ?>
								</div>
								    <div id="ft">
								        <div class="ftb">
							                <?php echo date( 'Y' ); ?>&nbsp; <?php echo $csite_name; ?>&nbsp;&nbsp;<?php require("template.php"); ?>
                                        </div>
								        <div id="top">
                                            <div class="top_button">
                                                 <a href="#" onclick="scrollToTop();return false;">
						                            <img src="templates/<?php echo $this->template ?>/images/top.png" width="30" height="30" alt="top" /></a>
                                            </div>
					                    </div>			
								    </div>
        </div>		
	
	</body> 
	</html>
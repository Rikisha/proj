<?php 

/*******************************************************************************************/
/*		Creative Commons License
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*
/*******************************************************************************************/

defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/joomla.css" type="text/css" />    

<?php 

include 'params.general.php';
include 'styles.php';

?>
</head>

<body>
	<div id="content">
    	<div id="colmain" style="margin-top:30px">
            <div id="component" <?php echo $maincolumn_cntwidth; ?> >
            	<div class="innerborder">        
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </div>
            </div>
        </div>
    </div>
</body>
</html>

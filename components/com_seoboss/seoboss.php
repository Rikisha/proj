<?php
/*------------------------------------------------------------------------
# SEO Boss
# ------------------------------------------------------------------------
# author    JoomBoss
# copyright Copyright (C) 2012 Joomboss.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomboss.com
# Technical Support:  Forum - http://joomboss.com/forum
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( JPATH_COMPONENT.DS.'controller.php' );
$controller = new SEOBossController( array('default_task' => 'redirectByURL') );
$controller->execute( JRequest::getCmd('task') );
$controller->redirect();

?>
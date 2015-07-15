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
$mainframe = & JFactory::getApplication();
$mainframe->registerEvent( 'onAfterContentSave',
'pluginSeoBoss_onAfterContentSave' );

function pluginSeoBoss_onAfterContentSave( &$article, $isNew ){
    $file = JPATH_ADMINISTRATOR.DS."components".
        DS."com_seoboss".DS."classes".DS."ArticleMetatagsContainer.php";
    if(is_object($article) && $article->id && $article->metakey &&
        is_file( $file )) {
        require_once( $file );
        $ac = new ArticleMetatagsContainer();
        $ac->saveKeywords($article->metakey, $article->id);
    }
}
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
jimport('joomla.html.toolbar.button');
//Seoboss Help button type
class JButtonSeoBossHelp extends JButton{
    var $_name = "SeoBoss Help";
    function fetchButton($type="Help", $ref=""){
        $text = JText::_("SEO_HELP_BUTTON");
        $class = $this->fetchIconClass('help');
        $cmd = "popupWindow('$ref', '".JText::_('SEO_HELP_BUTTON', true)."', 640, 480, 1)";
        $html = "<a href=\"#\" onclick=\"$cmd\" class=\"toolbar\">\n";
        $html .= "<span class=\"$class\" title=\"$text\">\n";
        $html .= "</span>\n";
        $html   .= "$text\n";
        $html   .= "</a>\n";
        return $html;
    }

    function fetchId($name)
    {
        return "SeoBossHelp";
    }
}

class TOOLBAR_seo {
    function _NEW_KEYWORD() {
        JToolBarHelper::save("save_keyword");
        JToolBarHelper::apply("save_keyword");
        JToolBarHelper::cancel();
    }
    function _KEYWORDS_LIST() {
        JToolBarHelper::title( JText::_( 'SEO_KEYWORDS_MANAGER' ),
'joomboss_keywords.png' );
        JToolBarHelper::custom('keywords_update_stat', 'apply', '', JText::_( 'SEO_UPDATE_GOOGLE_STAT' ), true);
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/51-seo-boss-keywords-manager?tmpl=component');
    }
    function _METATAGS_LIST() {
        JToolBarHelper::title( JText::_( 'SEO_META_TAGS_MANAGER' ),
'joomboss_metatag.png' );
        JToolBarHelper::custom('metatags_copy_keywords_to_title', 'apply', '', JText::_( 'SEO_COPY_KEYWORDS_TO_TITLE' ), true);
        JToolBarHelper::custom('metatags_copy_title_to_keywords', 'apply', '', JText::_( 'SEO_COPY_TITLE_TO_KEYWORDS' ), true);
        JToolBarHelper::custom('metatags_copy_item_title_to_keywords', 'apply', '', JText::_( 'SEO_COPY_ITEM_TITLE_TO_KEYWORDS' ), true);
        JToolBarHelper::custom('metatags_copy_item_title_to_title', 'apply', '', JText::_( 'SEO_COPY_ITEM_TITLE_TO_TITLE' ), true);
        JToolBarHelper::custom('metatags_generare_descriptions', 'apply', '', JText::_( 'SEO_GENERATE_DESCRIPTIONS' ), true);
        JToolBarHelper::save("metatags_save");
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/50-seo-boss-meta-tags-manager?tmpl=component');
        
    }
    //// FAT 32 start //////////////////////
    function _URL_LIST() {
        JToolBarHelper::title( JText::_( 'SEO_EXTERNAL_LINKS_TITLE' ),'joomboss_redirect.png' );
        JToolBarHelper::save("save_redirect");
        JToolBarHelper::apply("apply_redirect");
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/54-seo-boss-external-links?tmpl=component');
    }
    //// FAT32 is tired //////////////////////////

    function _PAGES_MANAGER(){
        JToolBarHelper::title( JText::_( 'SEO_PAGES_MANAGER' ),'joomboss_html.png' );
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/52-seo-boss-pages-manager?tmpl=component');
    }

    function _SETTINGS(){
        JToolBarHelper::title( JText::_( 'SEO_SETTINGS' ),'joomboss_settings.png' );
        JToolBarHelper::custom('settings_save', 'save', '', JText::_( 'SEO_SAVE' ), false);
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/53-seo-boss-settings?tmpl=component');
    }
    function _PANEL(){
        JToolBarHelper::title( JText::_( 'SEO_CONTROL_PANEL' ),'joomboss.png' );
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation?tmpl=component');
    }
    function _UPDATES_MANAGER(){
        JToolBarHelper::title( JText::_( 'SEO_UPDATES' ),
        'joomboss_update_manager.png' );
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/56-seo-boss-updates-manager?tmpl=component');
    }
    function _INSTALLED_FEATURES(){
        JToolBarHelper::title( JText::_( 'SEO_INSTALLED_FEATURES' ),
                'joomboss_update_manager.png' );
        JToolBarHelper::deleteList('', 'remove_feature');
        JToolBarHelper::custom('updates_manager_finalize', 'apply', '', 'Finalize', false);
        $bar = & JToolBar::getInstance('toolbar');
        
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/56-seo-boss-updates-manager?tmpl=component');
    }
    function _MANUAL_INSTALL(){
        JToolBarHelper::title( JText::_( 'SEO_MANUAL_INSTALLATION_INSTRUCTIONS' ),
            'joomboss_update_manager.png' );
    }
    function _REMOVE_FEATURE(){
        JToolBarHelper::title( JText::_( 'SEO_REMOVE_PLUGIN_CONFIRMATION' ),
            'joomboss_update_manager.png' );
    }
    function _BACKUP_MANAGER(){
        JToolBarHelper::title( JText::_( 'SEO_BACKUP_AND_RESTORE' ),'joomboss_backup.png' );
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/53-seo-boss-settings?tmpl=component');
    }
    
    function _EDIT_REGISTRATION_CODE(){
        JToolBarHelper::title( JText::_( 'SEO_MANAGE_REGISTRATION_CODE' ),'joomboss_settings.png' );
        JToolBarHelper::custom('options_update_code', 'save', '', JText::_( 'SEO_SAVE' ), false);
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'SeoBossHelp', 'http://joomboss.com/products/seoboss/documentation/53-seo-boss-settings?tmpl=component');
    }
    
    function _VIEW_DEFAULT_TAGS(){
        JToolBarHelper::title( JText::_( 'SEO_SITE_DEFAULT_METATAGS' ),'joomboss_settings.png' );
        JToolBarHelper::custom('settings_edit_tag', 'new', '', 'New', false);
    }
    
    function _EDIT_DEFAULT_TAG(){
        JToolBarHelper::title( JText::_( 'SEO_EDIT_SITE_DEFAULT_META_TAG' ),'joomboss_settings.png' );
        JToolBarHelper::custom('settings_save_tag', 'save', '', JText::_( 'SEO_SAVE' ), false);
        JToolBarHelper::cancel('settings_default_tags');
    }
    
    function _HELPDESK(){
        JToolBarHelper::title( JText::_( 'SEO_HELPDESK' ),'helpdesk.png' );
        JToolBarHelper::custom('helpdesk_new_request', 'new', '', JText::_( 'SEO_NEW_REQUEST' ), false);
    }
    
    function _HELPDESK_VIEW_REQUEST(){
        JToolBarHelper::title( JText::_( 'SEO_HELPDESK_REQUEST' ),'helpdesk.png' );
        JToolBarHelper::cancel('helpdesk');
    }
    function _HELPDESK_NEW_REQUEST(){
        JToolBarHelper::title( JText::_( 'SEO_NEW_HELPDESK_REQUEST' ),'helpdesk.png' );
        JToolBarHelper::custom('helpdesk_submit_request', 'save', '', JText::_( 'SEO_SUBMIT_REQUEST' ), false);
        JToolBarHelper::cancel('helpdesk');
    }
}
?>
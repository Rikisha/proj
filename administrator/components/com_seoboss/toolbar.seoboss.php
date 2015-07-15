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

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );
switch($task)
{
	case 'edit_keyword':
	case 'add_keyword':
		TOOLBAR_seo::_NEW_KEYWORD();
		break;
	case 'url_list':
		TOOLBAR_seo::_URL_LIST();
		break;
	case 'keywords_view':
	case 'keywords_update_stat':	
		TOOLBAR_seo::_KEYWORDS_LIST();
		break;
	case 'pages_manager':
		TOOLBAR_seo::_PAGES_MANAGER();
		break;
	case 'settings':
        TOOLBAR_seo::_SETTINGS();
        break;
	
	case 'updates_manager':
    case 'install':
        TOOLBAR_seo::_UPDATES_MANAGER();
        break;
    case 'manual_install':
        TOOLBAR_seo::_MANUAL_INSTALL();
        break;
    case 'installed_features':
        TOOLBAR_seo::_INSTALLED_FEATURES();
        break;
    case 'remove_feature':
        TOOLBAR_seo::_REMOVE_FEATURE();
        break;
    case 'backup_manager':
        TOOLBAR_seo::_BACKUP_MANAGER();
        break;
    case 'options_view_code':
        TOOLBAR_seo::_EDIT_REGISTRATION_CODE();
        break;
    case 'settings_default_tags':
        TOOLBAR_seo::_VIEW_DEFAULT_TAGS();
        break;
    case 'settings_edit_tag':
        TOOLBAR_seo::_EDIT_DEFAULT_TAG();
        break;
    case 'helpdesk':
        TOOLBAR_seo::_HELPDESK();
        break;
    case 'helpdesk_view_request':
        TOOLBAR_seo::_HELPDESK_VIEW_REQUEST();
        break;
    case 'helpdesk_new_request':
        TOOLBAR_seo::_HELPDESK_NEW_REQUEST();
        break;
    case 'metatags_view':
    case 'metatags_copy_keywords_to_title':
    case 'metatags_copy_title_to_keywords': 
    case 'metatags_copy_item_title_to_keywords':
    case 'metatags_copy_item_title_to_title':
    case 'metatags_generare_descriptions':
    case 'metatags_save':
        TOOLBAR_seo::_METATAGS_LIST();
        break;
    case 'panel':
    default:
        TOOLBAR_seo::_PANEL();
        break;
}
?>

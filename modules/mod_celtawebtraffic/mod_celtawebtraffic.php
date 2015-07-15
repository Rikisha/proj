<?php defined('_JEXEC') or die('Restricted access');

/**
 * @package             Joomla
 * @subpackage          CeltaWeb Traffic Module
 * @author              Steven Palmer
 * @author url          http://coalaweb.com
 * @author email        support@coalaweb.com
 * @license             GNU/GPL, see /files/en-GB.license.txt
 * @copyright           Copyright (c) 2013 Steven Palmer All rights reserved.
 *
 * The CeltaWeb traffic module was inspired by VCNT Thanks to Viktor Vogel {@link http://joomla-extensions.kubik-rubik.de/}
 *
 * CeltaWeb Traffic is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once dirname(__FILE__).'/helper.php';
    jimport( 'joomla.html.html' );
    jimport('joomla.utilities.date');


	$today 				= 	$params->get('today', JText::_('MOD_CELTAWEBTRAFFIC_TODAY'));
	$yesterday 			= 	$params->get('yesterday', JText::_('MOD_CELTAWEBTRAFFIC_YESTERDAY'));
	$all 				= 	$params->get('all', JText::_('MOD_CELTAWEBTRAFFIC_TOTAL'));
	$preset				= 	$params->get('preset', 0);
	$x_month 			= 	$params->get('month', JText::_('MOD_CELTAWEBTRAFFIC_MONTH'));
	$x_week				= 	$params->get('week', JText::_('MOD_CELTAWEBTRAFFIC_WEEK'));
	$s_today 			= 	$params->get('s_today',1);
	$s_yesterday                    =	$params->get('s_yesterday',1);
	$s_all				=	$params->get('s_all',1);
	$s_week				=	$params->get('s_week',1);
	$s_month			=	$params->get('s_month',1);
        $s_guestip                      =	$params->get('s_guestip',1);
        $guestip                        =	$params->get('guestip', JText::_('MOD_CELTAWEBTRAFFIC_VISITOR_IP'));
        $s_guestinfo                    =	$params->get('s_guestinfo',1);
        $guestinfo                      =	$params->get('guestinfo', JText::_('MOD_CELTAWEBTRAFFIC_VISITOR_INFO'));
	$copy 				= 	$params->get('copy', 1);
        $powered 			= 	$params->get('powered',JTEXT::_('MOD_CELTAWEBTRAFFIC_POWERED'));
	$horizontal			= 	$params->get('horizontal');
	$separator			=	$params->get('separator');
	$hor_text			=	$params->get('hor_text');
        $moduleclass_sfx                = 	$params->get('moduleclass_sfx', '');
        $select_theme                   =       $params->get('select_theme', '');
        $hline                          =       $params->get('hLine',1);
        $dateTimeFormat                 =       $params->get('dateTimeFormat');
        $s_dateTime                     =       $params->get('s_dateTime',1);
        $css_width                      =       $params->get('csswidth',0);
        $module_unique_id               =       $params->get('module_unique_id');


        //below is assigning values returned by the functions in the helper file to be displayed.
	$start = new mod_celtawebtrafficHelper;
        
	list($all_visitors, $today_visitors, $yesterday_visitors, $week_visitors, $month_visitors) = $start->read($params);

        if (!isset($ip)) $ip = '';
        $ip = mod_celtawebtrafficHelper::getIpAddress($ip);

        //Formating for the view
        $cssleft_t='<span class="cw_stats_lt'.$css_width.'">';
        $cssleft_y='<span class="cw_stats_ly'.$css_width.'">';
        $cssleft_w='<span class="cw_stats_lw'.$css_width.'">';
        $cssleft_m='<span class="cw_stats_lm'.$css_width.'">';
        $cssleft_a='<span class="cw_stats_la'.$css_width.'">';

        $cssright='<span class="cw_stats_r'.$css_width.'">';
        $cssclose='</span>';

        //Feed in the guests browser etc info from the getBrowser function
        if (!isset($ua)) $ua = '';
        $ua =  mod_celtawebtrafficHelper::getBrowser($params);
        $yourbrowser = $ua['name']." - ".$ua['platform'];
        
        if ($dateTimeFormat === 'LC1'){
            $date= JHtml::date($input= 'now', JText::_('DATE_FORMAT_LC1'), false);  
        }
        elseif ($dateTimeFormat === 'LC2'){
           $date= JHtml::date($input= 'now', JText::_('DATE_FORMAT_LC2'), false);  
        }
        elseif ($dateTimeFormat === 'LC3'){
           $date= JHtml::date($input= 'now', JText::_('DATE_FORMAT_LC3'), false);  
        }
        elseif ($dateTimeFormat === 'LC4'){
           $date= JHtml::date($input= 'now', JText::_('DATE_FORMAT_LC4'), false);  
        }
        elseif ($dateTimeFormat === 'JS1'){
           $date= JHtml::date($input= 'now', JText::_('DATE_FORMAT_JS1'), false);  
        }

        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI :: base().'media/mod_celtawebtraffic/css/cw-base.css');
        $document->addStyleSheet(JURI :: base().'media/mod_celtawebtraffic/css/themes/'.$select_theme.'/cw-visitors.css');
        
        //Who is online
        $s_whoisonline      =       $params->get('s_whoisonline');
        $hlineWho           =       $params->get('hLineWho');
        $showmode           =       $params->get('showmode');
        $title_align_who         = $params->get('title_align_who');
        $title_format_who         = $params->get('title_format_who');
        
        $display_title_who    = $params->get('display_title_who');
        $title_who            = $params->get('title_who',JTEXT::_('MOD_CELTAWEBTRAFFIC_TITLE_WHO'));
        $s_who_guests         =	$params->get('s_who_guests',1);
        $s_who_members        =	$params->get('s_who_members',1);
        $display_title_mb    = $params->get('display_title_mb');
        $title_mb            = $params->get('title_mb',JTEXT::_('MOD_CELTAWEBTRAFFIC_TITLE_MB'));


        if ($showmode == 0 || $showmode == 2) {
                $count	= mod_celtawebtrafficHelper::getOnlineCount();
        }

        if ($showmode > 0) {
                $names	= mod_celtawebtrafficHelper::getOnlineUserNames($params);
        }
        
require JModuleHelper::getLayoutPath('mod_celtawebtraffic', $params->get('layout', 'default'));

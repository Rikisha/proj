<?php
/**
 * @version		0.9.9 beta
 * @copyright	Copyright (C) 2010 - 2013 B-Support, Inc. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */

defined('_JEXEC') or die;
jimport('joomla.language.helper');
jimport('joomla.plugin.plugin');

/**
* Google Analytics integration Plugin
*/
class plgSystemOpenAnalytics extends JPlugin {

	/**
	 * Prepare content
	 */
	function onAfterRender() {
		// exit if executed on Administration
		if ( JFactory::getApplication()->isAdmin() ) return;

		//params
		$domain = trim( $this->params->get('domain') );
		$identity = trim($this->params->get('identity','UA-0000000-0'));

		// exit if non correct identity given
		if ( $identity=='UA-0000000-0' OR $identity=='' ) return;

		// process domain
		if ( empty($domain) ) $domain = $_SERVER['HTTP_HOST'];
		if ( substr($domain, 0, 1)!=='.' ) $domain = '.'.$domain;

		// asynchronous mode
		JResponse::setBody( str_ireplace(
			'</head>',
			$this->getOldCode(
				$domain,
				$identity,
				array(
					'pageload'=>$this->params->get('pageload',0),
					'betterlinks'=>$this->params->get('betterlinks',0)
				)
			).'</head>',
			JResponse::getBody()
		));
	}

	/**
	 * Returns Google Analytics integration code
	 * @param string $domain Domain without 'www.'
	 * @param string $identity Google Analytics Identificator for ex. ''UA-0038600-4'
	 * @param array $settings Settings of trakcer code (pageload)
	 * @return string
	 */
	function getOldCode($domain, $identity, $settings) {
		return 
		'<script type="text/javascript">'.
			'var _gaq = _gaq || [];'.
			'_gaq.push([\'_setAccount\', \''.$identity.'\']);'.
			'_gaq.push([\'_setDomainName\', \''.$domain.'\']);'.
			'_gaq.push([\'_setAllowLinker\', true]);'.
			($settings['pageload'] ? '_gaq.push(["_trackPageLoadTime"]);_gaq.push([\'_setSiteSpeedSampleRate\', 10]);':'').
			(
				$settings['betterlinks'] ? 
				'var pluginUrl = \'//www.google-analytics.com/plugins/ga/inpage_linkid.js\';'.
				'_gaq.push([\'_require\', \'inpage_linkid\', pluginUrl]);':''
			).
			'_gaq.push([\'_trackPageview\']);'.

			'(function() {'.
				'var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;'.
				'ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';'.
				'var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);'.
			'})();'.
		'</script>';
	}
}

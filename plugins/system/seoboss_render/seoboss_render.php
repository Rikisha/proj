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
$mainframe->registerEvent( 'onAfterRender',
'pluginSeoBossRender' );
class plgSystemSeoboss_render extends JPlugin{
    function onAfterContentSave(&$article, $isNew){
           
            $db =& JFactory::getDBO();
            $db->setQuery ("SELECT enable_google_ping from  #__seoboss_settings " );
            $settings = &$db->loadObject();
            if($settings->enable_google_ping){
                $className = get_class($article);
                require_once JPATH_ADMINISTRATOR.DS."components".DS.
                    "com_seoboss".DS."classes".DS."ExtensionsFactory.php";
                $extensions = ExtensionsFactory::getExtensions();
                if(is_array($extensions) && is_array($extensions['ping'])){
                    foreach( $extensions['ping'] as $pingHandler ){
                        if($pingHandler['class'] == $className){
                            require_once JPATH_ADMINISTRATOR.DS."components".DS.
                                "com_seoboss".DS.$pingHandler['file'];
                            $url = '';
                            $rss = '';
                            if( function_exists( $pingHandler['function'] ) ){
                                eval('$url='.$pingHandler['function'].'(&$article, $isNew);');
                            }
                            if( function_exists($pingHandler['rss_function'] ) ){
                                eval('$rss='.$pingHandler['rss_function'].'();');
                            }
                            if($url){

                                $db->setQuery("SELECT `domain` FROM `#__seoboss_settings`");
                                $domainName = $db->loadResult();

                                require_once JPATH_ADMINISTRATOR.DS."components".DS.
                                    "com_seoboss".DS."classes".DS."Pinger.php";
                                $config =& JFactory::getConfig();
                                $pinger = new Pinger;
                                $result = $pinger->pingGoogle(
                                    $config->getValue( 'config.sitename' ),
                                    "http://$domainName",
                                    "http://{$domainName}$url",
                                    "http://{$domainName}$rss"
                                );
                                $db->setQuery("INSERT INTO #__seoboss_ping_status
                                    (`date`, `title`, `url`, `response_code`, `response_text`) VALUES (
                                    NOW(), ".$db->quote($article->title).", ".
                                    $db->quote($url).", ".
                                    $db->quote($result[0]).",".
                                    $db->quote($result[1]).")");
                                $db->query();
                            }
                            break;
                        }
                    }
                }
            }
        }
     
     public function onContentAfterSave($context, &$article, $isNew){

            $db =& JFactory::getDBO();
            $db->setQuery ("SELECT enable_google_ping from  #__seoboss_settings " );
            $settings = &$db->loadObject();
            if($settings->enable_google_ping){
                $className = get_class($article);

                require_once JPATH_ADMINISTRATOR.DS."components".DS.
                    "com_seoboss".DS."classes".DS."ExtensionsFactory.php";
                $extensions = ExtensionsFactory::getExtensions();

                if(is_array($extensions) && is_array($extensions['ping'])){
                    foreach( $extensions['ping'] as $pingHandler ){
                        if($pingHandler['class'] == $className){
                            require_once JPATH_ADMINISTRATOR.DS."components".DS.
                                "com_seoboss".DS.$pingHandler['file'];
                            $url = '';
                            $rss = '';
                            if( function_exists( $pingHandler['function'] ) ){
                                eval('$url='.$pingHandler['function'].'(&$article, $isNew);');
                            }
                            if( function_exists($pingHandler['rss_function'] ) ){
                                eval('$rss='.$pingHandler['rss_function'].'();');
                            }
                            if($url){

                                $db->setQuery("SELECT `domain` FROM `#__seoboss_settings`");
                                $domainName = $db->loadResult();

                                require_once JPATH_ADMINISTRATOR.DS."components".DS.
                                    "com_seoboss".DS."classes".DS."Pinger.php";
                                $config =& JFactory::getConfig();
                                $pinger = new Pinger;
                                $result = $pinger->pingGoogle(
                                    $config->getValue( 'config.sitename' ),
                                    "http://$domainName",
                                    "http://{$domainName}$url",
                                    "http://{$domainName}$rss"
                                );
                                $db->setQuery("INSERT INTO #__seoboss_ping_status
                                    (`date`, `title`, `url`, `response_code`, `response_text`) VALUES (
                                    NOW(), ".$db->quote($article->title).", ".
                                    $db->quote($url).", ".
                                    $db->quote($result[0]).",".
                                    $db->quote($result[1]).")");
                                $db->query();
                            }
                            break;
                        }
                    }
                }
            }
        }


  }

function pluginSeoBossRender(){
	$app =& JFactory::getApplication();

    if($app->getName() != 'site') {
       return true;
    }

    $queryData = $_GET;
    ksort($queryData);
    $url = http_build_query($queryData);
    
    $buffer = JResponse::getBody();
    //Metatags processing
    require_once JPATH_ADMINISTRATOR.DS."components".DS."com_seoboss".DS."classes".DS."MetatagsContainerFactory.php";
    $buffer =  MetatagsContainerFactory::processBody( $buffer, $url );
    $db =& JFactory::getDBO();
    $db->setQuery ("SELECT sa_enable, sa_users from  #__seoboss_settings " );
    $settings = &$db->loadObject();
    if($settings->sa_enable == "1"){
    $user =& JFactory::getUser();
    $sa_users = explode(",", $settings->sa_users);
    if( in_array($user->username, $sa_users)){
    $metadata = MetatagsContainerFactory::getMetadata( $url );
    //insert the SEO Boss Metatags Anywhere feature
    $buffer = preg_replace("/<\\/head[^>]*>/i", '<link rel="stylesheet" href="'.JURI::base().'components/com_seoboss/css/anywhere.css" type="text/css" />$0', $buffer);
    $buffer = preg_replace("/<body[^>]*>/i", '$0
        <script language="javascript">
        function toggleSeobossAnywhere(){
        if( document.getElementById("seobossAnywhereForm").style.display==\'none\'){
          document.getElementById("seobossAnywhereForm").style.display = \'block\';
        }else{
        document.getElementById("seobossAnywhereForm").style.display = \'none\';
        }
        }
        </script>
                <div id="seobossAnywhereForm">
        <strong>SEO Boss Anywhere is fully available in Pro version only :(</strong>
        <form method="POST" action="'.JURI::base().'">
        <ol>
        <li>
          <label for="seoboss_title">Title</label>
          <input type="text" name="seoboss_title" id="seoboss_title" value="'.(isset($metadata['title_tag'])?htmlspecialchars($metadata['title_tag']):'').'"
        disabled="true"
        />
        </li>
        <li>
          <label for="seoboss_meta_title">Meta Title</label>
          <input type="text" name="seoboss_meta_title" id="seoboss_meta_title" value="'.(isset($metadata['metatitle'])?htmlspecialchars($metadata['metatitle']):'').'"
        disabled="true"
        />
        </li>
        <li>
          <label for="seoboss_meta_keywords">Meta Keywords</label>
          <input type="text" name="seoboss_meta_keywords" id="seoboss_meta_keywords" value="'.(isset($metadata['metakeywords'])?htmlspecialchars($metadata['metakeywords']):'').'"
        disabled="true"
        />
        </li>
        <li>
          <label for="seoboss_meta_description">Meta Description</label>
          <input type="text" name="seoboss_meta_description" id="seoboss_meta_description" value="'.(isset($metadata['metadescription'])?htmlspecialchars($metadata['metadescription']):'').'"
        disabled="true"
        />
        </li>
        <li>
      <input type="submit" value="Save" />
      <input type="submit" value="Cancel" onclick="toggleSeobossAnywhere();return false;" />    
   </li>
</ol>     
        <input type="hidden" name="option" value="com_seoboss"/>
        <input type="hidden" name="task" value="saveMetadata"/>
        <input type="hidden" name="url" value="'.$url.'"/>
        </form>   
        </div>
        <a id="seoboss_anywhere_toggle_link" href="#" onclick="toggleSeobossAnywhere();return false;">SEO Boss Anywhere</a>
', $buffer);
    }
    }
	 //Redirect processing
	require_once JPATH_ADMINISTRATOR."/components/com_seoboss/classes/RedirectFactory.php";
	$redirect =  new RedirectFactory();
	$buffer = $redirect->Redirect($buffer);
	//
	$db =& JFactory::getDBO();
	//set default metatags
	$db->setQuery ("SELECT `name`, `value` from  #__seoboss_default_tags" );
	$defaultMetaTags = &$db->loadObjectList();
    foreach($defaultMetaTags as $metaTag){
	    preg_match("/<meta[\\s]+name[\\s]*=[\\s]*\"".$metaTag->name."\"[\\s]+content[\\s]*=[\\s]*\"[^\"]*\"[\\s]*\\/>/i", $buffer, $match);
	    if($match && isset($match[0])){
	        $buffer = str_replace($match[0], "<meta name=\"".$metaTag->name."\" content=\"".$metaTag->value."\"/>", $buffer);
	    }else{
	        $buffer = str_replace("<head>", "<head>\n"."<meta name=\"".$metaTag->name."\" content=\"".$metaTag->value."\"/>", $buffer);
	    }
	}
    //Retreive settings
    
    $db->setQuery ("SELECT hilight_keywords, hilight_tag, hilight_class, hilight_skip from  #__seoboss_settings " );
    $settings = &$db->loadObject();
    if($settings->hilight_keywords){
	    preg_match("/<meta\\sname=\"keywords\"\\scontent=\"([^\"]*)\"/i", $buffer, $match);
	    if($match && isset($match[1])){
	    	$keywords = explode(",", $match[1]);
	    	require_once JPATH_ADMINISTRATOR."/components/com_seoboss/algorithm/DFA.php";
	        $dfa = new DFA();
	        $omitTags = array('title', 'textarea', 'style', 'script');
            if($settings->hilight_skip){
                $omitTags = array_merge($omitTags, explode(",", $settings->hilight_skip));
            }
	        $buffer = & $dfa->hilight($buffer, $keywords, $omitTags, $settings->hilight_tag, $settings->hilight_class );
	    }
    }
	JResponse::setBody($buffer);
}


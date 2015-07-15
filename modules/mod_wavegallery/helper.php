<?php 
/**
 * "Wave Gallery" Joomla module
 * Copyright (C) 2012 Daniel Pardons
 * License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 * Author: Daniel Pardons
 * Website: http://www.joompad.be
 */

// no direct access
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/helpers/route.php';
JModel::addIncludePath(JPATH_SITE.'/components/com_content/models');
require_once JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php';
/*
if( !defined('PhpThumbFactoryLoaded') ) {
	require_once dirname(__FILE__).DS.'libs'.DS.'phpthumb/ThumbLib.inc.php';
	define('PhpThumbFactoryLoaded',1);
}
*/
/**
 * modWaveGalleryHelper Class 
 */
 abstract class modWaveGalleryHelper {
	
	/**
	 * get the list of articles based on user selected criteria
	 * 
	 * @param JParameter $params;
	 * @return Array
	 */
	public static function getList(&$params )
	{

		$ordering      = $params->get( 'ordering', 'created_asc');
		$limit 	       = $params->get( 'limit_items', 4 );
/*
		$isThumb       = $params->get( 'auto_renderthumb',1);
		$thumbWidth    = (int)$params->get( 'thumbnail_width', 60 );
		$thumbHeight   = (int)$params->get( 'thumbnail_height', 60 );
		$imageHeight   = (int)$params->get( 'main_height', 300 ) ;
		$imageWidth    = (int)$params->get( 'main_width', 900 ) ;
*/
		
		// Get the dbo
		$db = JFactory::getDbo();

		// Get an instance of the generic articles model
		$model = JModel::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);
		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.title_alias, a.introtext, a.state, a.catid, a.created, a.created_by, a.created_by_alias,' .
									' a.modified, a.modified_by,a.publish_up, a.publish_down, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,a.images,' .
									' a.hits, a.featured,' .
									' LENGTH(a.fulltext) AS readmore');
		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $params->get('limit_items', 5));
		$model->setState('filter.published', 1);

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);
	   
	   
	   $source = trim($params->get( 'source', 'category' ) );
		if( $source == 'category' ){
		  // Category filter
		  $model->setState('filter.category_id', $params->get('category', array()));
		}else{
		  $ids = preg_split('/,/',$params->get( 'article_ids','')); 
		  $tmp = array();
		  foreach( $ids as $id ){
			$tmp[] = (int) trim($id);
		  }
		  $model->setState('filter.article_id', $tmp);  
		}

		// User filter
		$userId = JFactory::getUser()->get('id');
		switch ($params->get('user_id') ) {
		  case 'by_me':
			$model->setState('filter.author_id', (int) $userId);
			break;
		  case 'not_me':
			$model->setState('filter.author_id', $userId);
			$model->setState('filter.author_id.include', false);
			break;

		  case 0:
			break;

		  default:
			$model->setState('filter.author_id', (int) $params->get('user_id'));
			break;
		}

		// Filter by language
		$model->setState('filter.language',$app->getLanguageFilter());
		//  Featured switch
		switch ( $params->get('show_featured') )  {
		  case 1:
			$model->setState('filter.featured', 'only');
			break;
		  case 0:
			$model->setState('filter.featured', 'hide');
			break;
		  default:
			break;
		}
		// Set ordering
		$ordering = explode( '-', $ordering );

		if( trim($ordering[0]) == 'rand' ){
			$model->setState('list.ordering', ' RAND() '); 
		}
		else {
		  $model->setState('list.ordering', 'a.'.$ordering[0]);
		  $model->setState('list.direction', $ordering[1]);
		} 

		$items = $model->getItems();  

		if( empty($items) ) return array();

		foreach ($items as &$item) {
		  $item->slug = $item->id.':'.$item->alias;
		  $item->catslug = $item->catid.':'.$item->category_alias;

		  if ($access || in_array($item->access, $authorised))
		  {
			// We know that user has the privilege to view the article
			$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
		  }
		  else {
			$item->link = JRoute::_('index.php?option=com_user&view=login');
		  }

		  $item->date = JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC2')); 
			
		  $item->fulltext = $item->introtext;
		  $item->introtext   = JHtml::_('content.prepare', $item->introtext);
		  $item = self::parseImages( $item );
/*
		  if( $item->mainImage &&  $image=self::renderThumb($item->mainImage, $imageWidth, $imageHeight, $item->title, $isThumb ) ){
			$item->mainImage = $image;
		  }
		  if( $item->thumbnail &&  $image = self::renderThumb($item->thumbnail, $thumbWidth, $thumbHeight, $item->title ,  $isThumb ) ){
			$item->thumbnail = $image;
		  }
*/
  
		}
			
		return $items;
	}


	/**
	 *  check the folder is existed, if not make a directory and set permission is 755
	 *
	 *
	 * @param array $path
	 * @access public,
	 * @return boolean.
	 */
	public static function makeDir( $path ){
		$folders = explode ( '/',  ( $path ) );
		$tmppath =  JPATH_SITE.DS.'images'.DS.'wavegallerythumbs'.DS;
		if( !file_exists($tmppath) ) {
			JFolder::create( $tmppath, 0755 );
		}; 
		for( $i = 0; $i < count ( $folders ) - 1; $i ++) {
			if (! file_exists ( $tmppath . $folders [$i] ) && ! JFolder::create( $tmppath . $folders [$i], 0755) ) {
				return false;
			}	
			$tmppath = $tmppath . $folders [$i] . DS;
		}		
		return true;
	}
	
	/**
	 *  check the folder is existed, if not make a directory and set permission is 755
	 *
	 *
	 * @param array $path
	 * @access public,
	 * @return boolean.
	 */
	public static function renderThumb( $path, $width=100, $height=100, $title='', $isThumb=true ){
		
		if( $isThumb ){
			$path = str_replace( JURI::base(), '', $path );
			$imagSource = JPATH_SITE.DS. str_replace( '/', DS,  $path );
			if( file_exists($imagSource)  ) {
				$path =  $width."x".$height.'/'.$path;
				$thumbPath = JPATH_SITE.DS.'images'.DS.'wavegallerythumbs'.DS. str_replace( '/', DS,  $path );
				if( !file_exists($thumbPath) ) {
					$thumb = PhpThumbFactory::create( $imagSource  );  
					if( !self::makeDir( $path ) ) {
							return '';
					}		
					$thumb->adaptiveResize( $width, $height);
					 
					$thumb->save( $thumbPath  ); 
				}
				$path = JURI::base().'images/wavegallerythumbs/'.$path;
			} 
		}
		return '<img src="'.$path.'" title="'.$title.'" >';
	}
	
	/**
	 * parser a custom tag in the content of article to get the image setting.
	 * 
	 * @param string $text
	 * @return array if maching.
	 */
	public static function parserCustomTag( $text ){ 
		if( preg_match("#{wgimage(.*)}#s", $text, $matches, PREG_OFFSET_CAPTURE) ){ 
			return $matches;
		}	
		return null;
	}
	
	/**
	 * get parameters from configuration string.
	 *
	 * @param string $string;
	 * @return array.
	 */
	public static function parseParams( $string ) {
		$string = html_entity_decode($string, ENT_QUOTES);
		$regex = "/\s*([^=\s]+)\s*=\s*('([^']*)'|\"([^\"]*)\"|([^\s]*))/";
		 $params = null;
		 if(preg_match_all($regex, $string, $matches) ){
				for ($i=0;$i<count($matches[1]);$i++){ 
				  $key 	 = $matches[1][$i];
				  $value = $matches[3][$i]?$matches[3][$i]:($matches[4][$i]?$matches[4][$i]:$matches[5][$i]);
				  $params[$key] = $value;
				}
		  }
		  return $params;
	}
	
	/**
	 * parser a image in the content of article.
	 *
	 * @param.
	 * @return
	 */
	public static function parseImages( $row ){
		$text =  $row->introtext;		
		$row->images = json_decode( $row->images );
		if( isset($row->images->image_fulltext) && isset($row->images->image_intro) ){
			$row->thumbnail = $row->images->image_intro;
			$row->mainImage = $row->images->image_fulltext;	
			if( empty($row->images->image_fulltext) ){
				$row->mainImage = $row->images->image_intro;
			} 
			if( empty($row->images->image_intro) ){
				$row->thumbnail = $row->images->image_fulltext;	
			}
		}
		if( empty($row->thumbnail) &&   empty($row->mainImage) ){
			$regex = "/\<img.+src\s*=\s*\"([^\"]*)\"[^\>]*\>/";
			preg_match ($regex, $text, $matches); 
			$images = (count($matches)) ? $matches : array();
			
			if (count($images)){
				$row->mainImage = $images[1];
				$row->thumbnail = $images[1];
				$text= self::removeImage($text);	
			} else {
				$row->thumbnail = '';
				$row->mainImage = '';	
			}
		}
		$row->description= $text;		
		return $row;
	}
	

	public static function removeImage($str) {
		$regex1 = "/\<img[^\>]*>/";
		$str = preg_replace ( $regex1, '', $str );
		$regex1 = "/<div class=\"mosimage\".*<\/div>/";
		$str = preg_replace ( $regex1, '', $str );
		$str = trim ( $str );
		
		return $str;
	}

	
	/**
	 * get a subtring with the max length setting.
	 * 
	 * @param string $text;
	 * @param int $length limit characters showing;
	 * @param string $replacer;
	 * @return tring;
	 */
	public static function substring( $text, $length = 100, $replacer='...', $isAutoStripsTag = true ){
		$string =  $isAutoStripsTag?  strip_tags( $text ):$text;
		return JString::strlen( $string ) > $length ?  JHtml::_('string.truncate', $string, $length ): $string;
	}


	/**
	 * convert hex color to rgb color.
	 * 
	 * @param string $color;
	 * @return array with r g b values;
	 */

	public static function html2rgb($color) {
		if ($color[0] == '#')
			$color = substr($color, 1);

		if (strlen($color) == 6)
			list($r, $g, $b) = array($color[0].$color[1],
									 $color[2].$color[3],
									 $color[4].$color[5]);
		elseif (strlen($color) == 3)
			list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
		else
			return false;

		$r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

		return array($r, $g, $b);
	}

	/**
	 * convert rgb color to hex color.
	 * 
	 * @param array with r g b values;
	 * @return string $color;
	 */

	public static function rgb2html($r, $g=-1, $b=-1) {
		if (is_array($r) && sizeof($r) == 3)
			list($r, $g, $b) = $r;

		$r = intval($r); $g = intval($g);
		$b = intval($b);

		$r = dechex($r<0?0:($r>255?255:$r));
		$g = dechex($g<0?0:($g>255?255:$g));
		$b = dechex($b<0?0:($b>255?255:$b));

		$color = (strlen($r) < 2?'0':'').$r;
		$color .= (strlen($g) < 2?'0':'').$g;
		$color .= (strlen($b) < 2?'0':'').$b;
		return '#'.$color;
	}

}
?>
<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Core
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Base front controller
 *
 * @category   Mage
 * @package    Mage_Core
 */
class Mage_Core_Controller_Front_Action extends Mage_Core_Controller_Varien_Action
{
    /**
     * Currently used area
     *
     * @var string
     */
    protected $_currentArea = 'frontend';

    /**
     * Namespace for session.
     *
     * @var string
     */
    protected $_sessionNamespace = 'frontend';

    /**
     * Predispatch: shoud set layout area
     *
     * @return Mage_Core_Controller_Front_Action
     */
	public function preDispatch()
	{
	    $this->getLayout()->setArea($this->_currentArea);

	    parent::preDispatch();
	
		// If IE6 redirect is enabled, send to ie6-rdirect cms page
			$configData = Mage::getStoreConfig('modal_header');
			$ie6support = $configData['settings']['ie6support'];
			if($ie6support == 1){
			    if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.')){
					Mage::getDesign()->setPackageName('base');
					Mage::getDesign()->setTheme('ie6');
					if (stripos($_SERVER['REQUEST_URI'],'/ie6-redirect/') == false) { 
						Mage::app()->getFrontController()->getResponse()
		            		->setRedirect(Mage::getUrl('ie6-redirect'))
		            		->sendResponse();	
					};
			    }; 
			}
		
	    return $this;
	}


    /**
     * Postdispatch: should set last visited url
     *
     * @return Mage_Core_Controller_Front_Action
     */
    public function postDispatch()
    {
        parent::postDispatch();
        if (!$this->getFlag('', self::FLAG_NO_START_SESSION )) {
            Mage::getSingleton('core/session')->setLastUrl(Mage::getUrl('*/*/*', array('_current'=>true)));
        }
        return $this;
    }

    /**
     * Translate a phrase
     *
     * @return string
     */
    public function __()
    {
        $args = func_get_args();
        $expr = new Mage_Core_Model_Translate_Expr(array_shift($args), $this->_getRealModuleName());
        array_unshift($args, $expr);
        return Mage::app()->getTranslator()->translate($args);
    }
}

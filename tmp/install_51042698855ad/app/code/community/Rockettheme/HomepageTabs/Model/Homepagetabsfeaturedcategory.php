<?php
/**
 * @version   1.7.0.1 May 14, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

class Rockettheme_HomepageTabs_Model_Homepagetabsfeaturedcategory
{
    public function toOptionArray()
    {
        $tree = Mage::getResourceModel('catalog/category_tree');

        $collection = Mage::getResourceModel('catalog/category_collection');

        $collection->addAttributeToSelect('name')

            ->load();

        $options = array();

 
        foreach ($collection as $category) {
            $options[] = array(
               'label' => $category->getName(),
               'value' => $category->getId()
            );
        }

        return array('disabled'=>'Disabled')+$options;

    }
 }


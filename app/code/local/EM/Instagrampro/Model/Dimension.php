<?php
/**
 * Created by PhpStorm.
 * User: musia
 * Date: 19/07/2017
 * Time: 10:17 PM
 */
class EM_Instagrampro_Model_Dimension
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label'=>Mage::helper('adminhtml')->__('150x150')),
            array('value' => 2, 'label'=>Mage::helper('adminhtml')->__('306x306')),
            array('value' => 3, 'label'=>Mage::helper('adminhtml')->__('612x612')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            1 => Mage::helper('adminhtml')->__('150x150'),
            2 => Mage::helper('adminhtml')->__('306x306'),
            3 => Mage::helper('adminhtml')->__('612x612'),
        );
    }

}

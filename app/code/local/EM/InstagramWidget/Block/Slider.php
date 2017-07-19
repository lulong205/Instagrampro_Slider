<?php
class EM_InstagramWidget_Block_Slider extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface{
     protected function _toHtml()
    {
		$block = Mage::app()->getLayout()->createBlock('instagrampro/instagrampro')->setTemplate('instagrampro/instagrampro.phtml');

		return $block->toHtml();

    }
};
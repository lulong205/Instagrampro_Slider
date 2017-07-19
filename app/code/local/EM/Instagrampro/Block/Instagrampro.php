<?php
/**
 * Created by PhpStorm.
 * User: musia
 * Date: 19/07/2017
 * Time: 10:09 PM
 */
class EM_Instagrampro_Block_Instagrampro extends Mage_Core_Block_Template
{
    public function getModelInstagram()
    {
        return Mage::getModel('instagrampro/instagrampro')->getDetailData();
    }
}

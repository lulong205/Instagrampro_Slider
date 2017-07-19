<?php
/**
 * Created by PhpStorm.
 * User: musia
 * Date: 19/07/2017
 * Time: 10:54 PM
 */

class EM_Instagrampro_IndexController extends Mage_Core_Controller_Front_Action
{
    protected function _getHelper()
    {
        return Mage::helper('instagrampro')->getConfigData();
    }

    public function indexAction()
    {
        $dataInsta = $this->_getHelper();

        $this->loadLayout();
        $this->renderLayout();
    }

}

?>

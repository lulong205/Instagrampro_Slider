<?php
/**
 * Created by PhpStorm.
 * User: musia
 * Date: 19/07/2017
 * Time: 10:29 PM
 */
class EM_Instagrampro_Model_Instagrampro extends Mage_Core_Model_Abstract{

    public function getDbConfigData(){
        $storeId = Mage::app()->getStore()->getId();

        return Mage::getStoreConfig('instagrampro/instagrampro_settings',$storeId);

    }

    public function getDetailData(){


        $configData = $this->getDbConfigData();

        $data = '';
        if($configData['instagrampro_status'] == 1){
            $url = "https://api.instagram.com/v1/users/".$configData['instagrampro_userid']."/media/recent?s=150&access_token=".$configData['instagrampro_token'];

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $json = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($json);

            $width='';
            switch($configData['instagrampro_dimension'])
            {
                case '1':
                    $width=150;
                    $width_height='150x150';
                    break;
                case '2':
                    $width=306;
                    $width_height='306x306';
                    break;
                case '3':
                    $width=612;
                    $width_height='612x612';
                    break;
            }
            foreach ($result->data as $post) {
                $data['images'][] = array(
                    'title' => ($post->caption)? (($post->caption->text) ? $post->caption->text :'') : '',
                    'link'  => $post->link,
                    'image' => str_replace('s320x320','s'.$width_height,$post->images->low_resolution->url)
                );
            }
            $data['title'] = $configData['instagrampro_title'];
            $data['item'] = $configData['instagrampro_item'];
            $data['width'] = $width;
            $data['status'] = $configData['instagrampro_status'];

            return $data;
        }

        $storeId = Mage::app()->getStore()->getId();

        return Mage::getStoreConfig('instagrampro/instagrampro_settings',$storeId);

    }
}

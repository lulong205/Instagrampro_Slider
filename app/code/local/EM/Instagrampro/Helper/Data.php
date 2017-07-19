<?php
/**
 * Created by PhpStorm.
 * User: musia
 * Date: 19/07/2017
 * Time: 10:11 PM
 */
class EM_Instagrampro_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getConfigData()
    {
        $storeId = Mage::app()->getStore()->getId();

        $configData = Mage::getStoreConfig('instagrampro/instagrampro_settings',$storeId);

        $data = '';
        if($configData['instagrampro_status'] == 1){
            $url = "https://api.instagram.com/v1/users/".$configData['instagrampro_userid']."/media/recent?s=150&access_token=".$configData['instagrampro_token']."&count=".$configData['instagrampro_item'];

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
            $data['item'] = ($configData['instagrampro_item'] == '')?0:$configData['instagrampro_item'];
            $data['width'] = $width;
            $data['autoplayspeed'] = $configData['instagrampro_play_speed'];
            $data['status'] = $configData['instagrampro_status'];

           // $data['margin']= ($configData['instagrampro_margin']== '')?10:$configData['instagrampro_margin'];;

            return $data;
        }
        else
        {
            return ;
        }
    }
}

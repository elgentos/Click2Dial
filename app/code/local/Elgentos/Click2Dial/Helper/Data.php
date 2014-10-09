<?php

class Elgentos_Click2Dial_Helper_Data extends Mage_Core_Helper_Abstract {

    public function dial($callTo,$origin) {

        $data = array(
          "hash"=>Mage::getStoreConfig('click2dial/general/hash'),
          "a_number"=>Mage::getStoreConfig('click2dial/general/extension'),
          "b_number"=>$callTo,
          "b_cli"=>Mage::getStoreConfig('click2dial/general/origin'),
          "auto_answer"=> (boolean)Mage::getStoreConfig('click2dial/general/autoanswer')
        );
        if(!empty($origin)) {
            $data['b_cli'] = $origin;
        }

        $data_string = json_encode($data);

        $ch = curl_init(Mage::getStoreConfig('click2dial/general/api'));
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                    'Content-type: application/json',
                    'Accept: application/json'
            )
        );

        $result = curl_exec($ch);

        echo $result;
    }
}
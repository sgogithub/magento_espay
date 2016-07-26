<?php
class Plus_Espaypaymentmethod_Helper_Data extends Mage_Core_Helper_Abstract
{
  function getPaymentGatewayUrl()
    {
      return Mage::getUrl('espaypaymentmethod/payment/gateway', array('_secure' => false));
    }

  function getBackUrl($product, $orderId){
    return Mage::getUrl('espaypaymentmethod/payment/response', array('_secure' => false,   '_use_rewrite' => true, '_query' => array('id' => $orderId, 'product' => $product)));
  }

  function getTrxFeeLabel(){
    return Mage::getStoreConfig('payment/espay/trxfeelabel');
  }
  
  function generateTrxSignature($rqDatetime, $order_id, $mode){
      $key = Mage::getStoreConfig('payment/espay/sigpassword');
      $data = "##".$key."##".$rqDatetime."##".$order_id."##".$mode."##";
      
      #var_dump($data);
      $upperCase = strtoupper($data);
      $signature = hash('sha256', $upperCase);
      #var_dump($signature);
      #die();
      return $signature;
  }

  

}
 ?>

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


}
 ?>

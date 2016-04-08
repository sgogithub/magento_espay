<?php
class Plus_Espaypaymentmethod_Helper_Data extends Mage_Core_Helper_Abstract
{
  function getPaymentGatewayUrl()
    {
      return Mage::getUrl('espayapaymentmethod/payment/gateway', array('_secure' => false));
    }

}
 ?>

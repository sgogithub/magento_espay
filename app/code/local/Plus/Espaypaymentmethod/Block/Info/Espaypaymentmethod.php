<?php
class Plus_Espaypaymentmethod_Block_Info_Espaypaymentmethod extends Mage_Payment_Block_Info
{
  protected function _prepareSpecificInformation($transport = null)
  {
    if (null !== $this->_paymentSpecificInformation)
    {
      return $this->_paymentSpecificInformation;
    }

    $data = array();
    if ($this->getInfo()->getEspayPaymentMethod())
    {
      $espayPayment = explode(':', $this->getInfo()->getEspayPaymentMethod());
      $productName = $espayPayment[2];
      $data[Mage::helper('payment')->__('Payment Method')] = $productName;
    }

    $transport = parent::_prepareSpecificInformation($transport);

    return $transport->setData(array_merge($data, $transport->getData()));
  }
}

 ?>

<?php
// app/code/local/Envato/Custompaymentmethod/Model/Paymentmethod.php
class Plus_Espaypaymentmethod_Model_Paymentmethod extends Mage_Payment_Model_Method_Abstract {
  protected $_code  = 'espaypaymentmethod';
  protected $_formBlockType = 'espaypaymentmethod/form_espaypaymentmethod';
  protected $_infoBlockType = 'espaypaymentmethod/info_espaypaymentmethod';



  public function assignData($data)
  {

    $info = $this->getInfoInstance();
    if ($data->getEspayPaymentMethod())
    {
      Mage::getSingleton('core/session')->setEspayPaymentMethod($data->getEspayPaymentMethod());
      $info->setEspayPaymentMethod($data->getEspayPaymentMethod());
    }


    return $this;
  }

  public function validate()
  {
    parent::validate();
    $info = $this->getInfoInstance();

    $errorMsg = FALSE;

    if ($info->getEspayPaymentMethod() === '')
    {

      $errorCode = 'invalid_data';
      $errorMsg = $this->_getHelper()->__("Please Select Payment Method.\n");
    }


    if ($errorMsg)
    {
      Mage::throwException($errorMsg);
    }

    return $this;
  }

  public function getOrderPlaceRedirectUrl()
  {
    return Mage::getUrl('espaypaymentmethod/payment/redirect', array('_secure' => false));
  }

  public function atmProduct()
  {
      return array(
          'BIIATM',
          'PERMATAATM',
          'MUAMALATATM',
          'BCAATM'
      );
  }




}

?>

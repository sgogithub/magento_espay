<?php
// app/code/local/Envato/Custompaymentmethod/Model/Paymentmethod.php
class Plus_Espaypaymentmethod_Model_Paymentmethod extends Mage_Payment_Model_Method_Abstract {
  protected $_code  = 'espaypaymentmethod';
  protected $_formBlockType = 'espaypaymentmethod/form_espaypaymentmethod';
  protected $_infoBlockType = 'espaypaymentmethod/info_espaypaymentmethod';

  protected $_typeProduct = array(
    'PERMATAATM' => 'ATM Transfer',
    'BIIATM' => 'ATM Transfer',
    'BCAKLIKPAY' => 'Online Payment',
    'DKIIB' => 'Online Payment',
    'EPAYBRI' => 'Online Payment',
    'MANDIRIIB' => 'Online Payment',
    'PERMATANETPAY' => 'Online Payment',
    'NOBUPAY' => 'E-Money',
    'MANDIRIECASH' => 'E-Money',
    'XLTUNAI' => 'E-Money',
    'TCASH' => 'E-Money',
    'MAYAPADAIB' => 'Online Payment',
    'DANAMONOB' => 'Online Payment',
    'CREDITCARD' => 'Credit Card',
    'MANDIRISMS' => 'Online Payment',
    'BNIDBO' => 'Online Payment',
  );

  public function assignData($data)
  {
    $info = $this->getInfoInstance();

    if ($data->getCustomFieldOne())
    {
      $info->setCustomFieldOne($data->getCustomFieldOne());
    }

    if ($data->getCustomFieldTwo())
    {
      $info->setCustomFieldTwo($data->getCustomFieldTwo());
    }

    return $this;
  }

  public function validate()
  {
    parent::validate();
    $info = $this->getInfoInstance();

    if (!$info->getCustomFieldOne())
    {
      $errorCode = 'invalid_data';
      $errorMsg = $this->_getHelper()->__("CustomFieldOne is a required field.\n");
    }

    if (!$info->getCustomFieldTwo())
    {
      $errorCode = 'invalid_data';
      $errorMsg .= $this->_getHelper()->__('CustomFieldTwo is a required field.');
    }

    if ($errorMsg)
    {
      Mage::throwException($errorMsg);
    }

    return $this;
  }

  public function getOrderPlaceRedirectUrl()
  {
    return Mage::getUrl('custompaymentmethod/payment/redirect', array('_secure' => false));
  }

  public function getEspayProduct()
  {

  }
}

?>

<?php
// app/code/local/Envato/Custompaymentmethod/Model/Paymentmethod.php
class Plus_Espaypaymentmethod_Model_Paymentmethod extends Mage_Payment_Model_Method_Abstract {
  protected $_code  = 'espaypaymentmethod';
  protected $_formBlockType = 'espaypaymentmethod/form_espaypaymentmethod';
  protected $_infoBlockType = 'espaypaymentmethod/info_espaypaymentmethod';



  public function assignData($data)
  {

    $dataPost = Mage::app()->getRequest()->getPost('payment');

    $info = $this->getInfoInstance();
    if ($data->getEspayPaymentMethod())
    {
      Mage::getSingleton('core/session')->setEspayPaymentMethod($dataPost['espay_payment_method']);
      $info->setEspayPaymentMethod($dataPost['espay_payment_method']);
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
          'BRIATM',
          'DANAMONATM',
          'MASPIONATM',
          'PERMATAATM',
          'MUAMALATATM',
          'BCAATM',
          'FINPAY195',
          'XLTUNAI',
          'TCASH'
      );
  }


  public static function getFee($address)
    {

      $paymentMethod = Mage::getSingleton('checkout/session')->getQuote()->getPayment()->getMethodInstance()->getCode();Mage::getSingleton('checkout/session')->getQuote()->getPayment()->getMethodInstance()->getCode();
      if ($paymentMethod === 'espaypaymentmethod'){
        $fee = 5000;
        $data = Mage::app()->getRequest()->getPost('payment');
        $paymentData = $data['espay_payment_method'];
        $espayPayment = explode(':', $paymentData);
        $productCode = $espayPayment[0];
        $trxfee = Mage::getStoreConfig('payment/espay/'.strtolower($productCode).'trxfee') ;
        $fee = ($trxfee === NULL ? $fee : $trxfee);

        if ($productCode === 'CREDITCARD' || $productCode === 'BNIDBO'){
          $pct = Mage::getStoreConfig('payment/espay/ccfee') ;
          $dec = str_replace('%', '', $pct) / 100;
          
          if ($address->getEspayFeeAmount() != 0 || $address->getEspayFeeAmount() !== NULL){
              $totalWithoutFee = $address->getOrigData('grand_total') - $address->getEspayFeeAmount();
          }
          $total = floatval($totalWithoutFee) + floatval($fee);
          $ccFee = floatval($dec) * floatval($total);
          $fee = floatval($fee)+floatval($ccFee);

        }
      }
      return $fee;
    }
    /**
     * Check if fee can be apply
     *
     * @static
     * @param Mage_Sales_Model_Quote_Address $address
     * @return bool
     */
    public static function canApply($address)
    {
      $paymentMethod = '';
      try {
        $paymentMethod = Mage::getSingleton('checkout/session')->getQuote()->getPayment()->getMethodInstance()->getCode();
      } catch (Exception $e) {
        Mage::log('Fee Log ', Zend_Log::EMERG);
      }


      if ($paymentMethod === 'espaypaymentmethod'){
        return TRUE;
      }else {
          return FALSE;
      }

    }


}

?>

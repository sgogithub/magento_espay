<?php
// app/code/local/Envato/espaypaymentmethod/controllers/PaymentController.php
class Plus_Espaypaymentmethod_PaymentController extends Mage_Core_Controller_Front_Action
{

  /**
   * @return Mage_Checkout_Model_Session
   */
  protected function _getCheckout() {
    return Mage::getSingleton('checkout/session');
  }

  protected function _getResponseInquiry($status,$message = 'Success',$order = array()){
    $return = '';

    if ($status === '0'){
      $return = '0;'.$message.';'.$order['increment_id'].';'.number_format($order['grand_total'],2,'.' , '').';'.$order['order_currency_code'].';Payment '.$order['increment_id'].';'.date('d/m/Y h:i:s');
    }else {
      $return = '1;'.$message.';;;;;';
    }

    return $return;
  }


  protected function _getResponseReport($status,$message = 'Success',$order = array()){
    $return = '';

    if ($status === '0'){
      $return = '0,'.$message.','.$order['increment_id'].','.$order['increment_id'].','.date('Y-m-d H:i:s');
    }else {
      $return = '1,'.$message.',,,';
    }

    return $return;
  }


  public function gatewayAction()
  {
    if ($this->getRequest()->get("orderId"))
    {
      $arr_querystring = array(
        'flag' => 1,
        'orderId' => $this->getRequest()->get("orderId")
      );

      Mage_Core_Controller_Varien_Action::_redirect('espaypaymentmethod/payment/response', array('_secure' => false, '_query'=> $arr_querystring));
    }
  }

  public function redirectAction()
  {
    $orderIncrementId = $this->_getCheckout()->getLastRealOrderId();
    $order = Mage::getModel('sales/order')
        ->loadByIncrementId($orderIncrementId);
    $sessionId = Mage::getSingleton('core/session');
    $orderData = $order->getData();

    $productModel = Mage::getModel('catalog/product');
    $paymentData = $sessionId->getPaymentData();
    $espayPayment = explode(':', $paymentData['espay_payment_method']);

    $productCode = $espayPayment[0];
    $bankCode = $espayPayment[1];

    $urlJs =   Mage::getStoreConfig('payment/espay/environmentt') == 'production'? 'https://secure.sgo.co.id' : 'http://secure-dev.sgo.co.id';
    $key =   Mage::getStoreConfig('payment/espay/paymentid');

    Mage::getSingleton('checkout/session')->unsQuoteId();
    foreach( Mage::getSingleton('checkout/session')->getQuote()->getItemsCollection() as $item ){
      Mage::getSingleton('checkout/cart')->removeItem( $item->getId() )->save();
    }
    //delete item from cart
    foreach( Mage::getSingleton('checkout/session')->getQuote()->getItemsCollection() as $item ){
      Mage::getSingleton('checkout/cart')->removeItem( $item->getId() )->save();
    }

    $this->loadLayout();
    $block = $this->getLayout()->createBlock('Mage_Core_Block_Template','espaypaymentmethod',array('template' => 'espaypaymentmethod/redirect.phtml'));
    $block->assign(array('urlJs'=>$urlJs,'key'=>$key, 'totalAmount' => $totalAmount, 'orderId' => $orderIncrementId, 'bankCode' => $bankCode, 'productCode' => $productCode));
    $this->getLayout()->getBlock('content')->append($block);
    $this->renderLayout();

  }


  public function inquiryAction(){
    $vr = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
    $vr->setNoRender(true);

    $this->loadLayout();
    $this->getResponse()->setBody(
       $this->getLayout()->createBlock('adminhtml/sales_order_view_tab_invoices')->toHtml()
    );

    $password =   Mage::getStoreConfig('payment/espay/password');
    $defaultPaymentStatus = Mage::getStoreConfig('payment/espay/default_order_status');

    $webServicePassword = $this->getRequest()->getPost('password');
    $orderId = $this->getRequest()->getPost('order_id');

    if ($webServicePassword ==  $password){
      $order = Mage::getModel('sales/order')
          ->loadByIncrementId($orderId);

      $orderData = $order->getData();
      if (!empty($orderData)){
        if ($orderData['status'] === $defaultPaymentStatus){
            echo $this->_getResponseInquiry('0','Success' ,$orderData);
        }else {
            echo $this->_getResponseInquiry('1', 'Order Has been Processed');
        }
      }else {
        echo $this->_getResponseInquiry('1', 'Order Id Not Valid');
      }
    }else {
        echo $this->_getResponseInquiry('1', 'Failed');
    }


  }


  public function reportAction(){
    $vr = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
    $vr->setNoRender(true);

    $this->loadLayout();
    $this->getResponse()->setBody(
       $this->getLayout()->createBlock('adminhtml/sales_order_view_tab_invoices')->toHtml()
    );

    $password =   Mage::getStoreConfig('payment/espay/password');
    $defaultPaymentStatus = Mage::getStoreConfig('payment/espay/default_order_status');

    $webServicePassword = $this->getRequest()->getPost('password');
    $orderId = $this->getRequest()->getPost('order_id');
    if ($webServicePassword ==  $password){
      $order = Mage::getModel('sales/order')
          ->loadByIncrementId($orderId);

      $orderData = $order->getData();
      if (!empty($orderData)){
        if ($orderData['status'] === $defaultPaymentStatus){
            try {
              $order->setState(Mage_Sales_Model_Order::STATE_PAYMENT_REVIEW, true, 'Payment Success.');
              $order->save();
              $order->sendNewOrderEmail();
          		$order->setEmailSent(true);
              $status = '0';
              $message = 'success';
            } catch (Exception $e) {
              $status = '1';
              $message = 'Update Order Failed';
            }
        }else {
          $status = '1';
          $message = 'Order has been processed';
        }
      }else {
        $status = '1';
        $message = 'Order Id Not Valid';
      }
    }else {
      $status = '1';
      $message = 'Failed';
    }
    echo $this->_getResponseReport($status,$message ,$orderData);
  }


  public function responseAction()
  {
    $redirect = FALSE;
    $productModel = Mage::getModel('espaypaymentmethod/paymentmethod');
    $atmProducts = $productModel->atmProduct();
    if ($this->getRequest()->get("id") && $this->getRequest()->get("product"))
    {
      if ($this->getRequest()->get("product") !== '' && $this->getRequest()->get("id") !== ''){
        if (in_array($this->getRequest()->get("product"), $atmProducts) ){
          $redirect = TRUE;
        }else {
          $order = Mage::getModel('sales/order')
              ->loadByIncrementId($this->getRequest()->get("id"));

          $orderData = $order->getData();
          if (!empty($orderData)){
            if ($orderData['state'] === Mage_Sales_Model_Order::STATE_PAYMENT_REVIEW){
              $redirect = TRUE;
            }
          }
        }
      }
    }


    if ($redirect){
      Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/success', array('_secure'=> false));
    }else {
      Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/failure', array('_secure'=> false));
    }
  }




}

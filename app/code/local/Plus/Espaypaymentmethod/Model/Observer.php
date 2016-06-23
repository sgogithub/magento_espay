<?php
// app/code/local/Envato/Custompaymentmethod/Model/Paymentmethod.php
class Plus_Espaypaymentmethod_Model_Observer {

  public function savePaymentMethod($event){

    $orderEvent = $event->getOrder();
    $entity_id = $orderEvent->getEntityId();
    $sessionId = Mage::getSingleton('core/session');
    $paymentData = $sessionId->getEspayPaymentMethod();

    $resource = Mage::getSingleton('core/resource');
    $writeConnection = $resource->getConnection('core_write');
    $table = $resource->getTableName('sales/order_payment');
    $query = 'UPDATE '.$table.' SET espay_payment_method = "'.$paymentData.'" WHERE entity_id ='.(int)$entity_id.';';
    $writeConnection->query($query);

    $orderEvent = $event->getOrder();

  }
  /**
     * Set fee amount invoiced to the order
     *
     * @param Varien_Event_Observer $observer
     * @return Magentix_Fee_Model_Observer
     */
    public function invoiceSaveAfter(Varien_Event_Observer $observer)
    {


        $invoice = $observer->getEvent()->getInvoice();

        if ($invoice->getBaseEspayFeeAmount()) {
            $order = $invoice->getOrder();
            $order->setEspayFeeAmountInvoiced($order->getEspayFeeAmountInvoiced() + $invoice->getEspayFeeAmount());
            $order->setBaseEspayFeeAmountInvoiced($order->getBaseEspayFeeAmountInvoiced() + $invoice->getBaseEspayFeeAmount());
        }
        return $this;
    }
    /**
     * Set fee amount refunded to the order
     *
     * @param Varien_Event_Observer $observer
     * @return Magentix_Fee_Model_Observer
     */
    public function creditmemoSaveAfter(Varien_Event_Observer $observer)
    {
        $creditmemo = $observer->getEvent()->getCreditmemo();
        if ($creditmemo->getEspayFeeAmount()) {
            $order = $creditmemo->getOrder();
            $order->setEspayFeeAmountRefunded($order->getFeeAmountRefunded() + $creditmemo->getFeeAmount());
            $order->setBaseEspayFeeAmountRefunded($order->getBaseEspayFeeAmountRefunded() + $creditmemo->getBaseEspayFeeAmount());
        }
        return $this;
    }


  

}

?>

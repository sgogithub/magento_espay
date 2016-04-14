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
  }

}

?>

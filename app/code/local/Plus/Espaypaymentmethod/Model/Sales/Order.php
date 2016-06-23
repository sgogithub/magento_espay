<?php
class Plus_Espaypaymentmethod_Model_Sales_Order extends Mage_Sales_Model_Order
{

    private $_espayFeeAmount = 'espay_fee_amount';
    private $_baseEspayFeeAmount = 'base_espay_fee_amount';
    private $_espayPaymentMethod = 'espay_payment_method';

    public function getEspayFeeAmount() {
      $rows = '';
      $resource = Mage::getSingleton('core/resource');
      $writeConnection = $resource->getConnection('core_read');
      $table = $resource->getTableName('sales/order');
      $sql        = "SELECT `".$this->_espayFeeAmount."` FROM `".$table."` WHERE `increment_id` = ".$this->getIncrementId();
      try {
        $rows       = $writeConnection->fetchOne($sql); //fetchRow($sql), fetchOne($sql),...
      } catch (Exception $e) {
        Mage::throwException($e);
        Mage::log($e);
      }
      return $rows;
    }


    public function getBaseEspayFeeAmount() {
      $rows = '';
      $resource = Mage::getSingleton('core/resource');
      $writeConnection = $resource->getConnection('core_read');
      $table = $resource->getTableName('sales/order');
      $sql        = "SELECT `".$this->_baseEspayFeeAmount."` FROM `".$table."` WHERE `increment_id` = ".$this->getIncrementId();
      try {
        $rows       = $writeConnection->fetchOne($sql); //fetchRow($sql), fetchOne($sql),...
      } catch (Exception $e) {
        Mage::throwException($e);
        Mage::log($e);
      }
      return $rows;
    }


    
    /*
    public function setEspayFeeAmount($amount) {
      $resource = Mage::getSingleton('core/resource');
      $writeConnection = $resource->getConnection('core_write');
      $table = $resource->getTableName('sales/order');
      $query = "UPDATE '.$table.' SET `".$this->_espayFeeAmount."` = ".$amount." WHERE `increment_id` = ".$this->getIncrementId();
      try {
        $writeConnection->query($query);
      } catch (Exception $e) {
        Mage::throwException($e);
        Mage::log($e);
      }
    }*/
}

?>

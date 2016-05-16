<?php

class Plus_Espaypaymentmethod_Block_Sales_Order_Espaypaymentmethodfee extends Mage_Core_Block_Template
{
  #die();
    /**
     * Get order store object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return $this->getParentBlock()->getOrder();
    }
    /**
     * Get totals source object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }
    /**
     * Initialize fee totals
     *
     * @return Magentix_Fee_Block_Sales_Order_Fee
     */
    public function initTotals()
    {

      $source = $this->getOrder();
      $value  = $source->getEspayFeeAmount();
      $this->getParentBlock()->addTotal(new Varien_Object(array(
              'code'   => 'fee',
              'strong' => false,
              'label'  => Mage::helper('espaypaymentmethod/data')->getTrxFeeLabel(),
              'value'  => $value
      )));

        return $this;
    }
}
?>

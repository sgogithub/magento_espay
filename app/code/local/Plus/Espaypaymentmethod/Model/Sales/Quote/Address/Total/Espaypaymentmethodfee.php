<?php
/**
 * Created by Magentix
 * Based on Module from "Excellence Technologies" (excellencetechnologies.in)
 *
 * @category   Magentix
 * @package    Magentix_Fee
 * @author     Matthieu Vion (http://www.magentix.fr)
 * @license    This work is free software, you can redistribute it and/or modify it
 */
class Plus_Espaypaymentmethod_Model_Sales_Quote_Address_Total_Espaypaymentmethodfee extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    protected $_code = 'fee';
    /**
     * Collect fee address amount
     *
     * @param Mage_Sales_Model_Quote_Address $address
     * @return Magentix_Fee_Model_Sales_Quote_Address_Total_Fee
     */
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);
        $this->_setAmount(0);
        $this->_setBaseAmount(0);
        $items = $this->_getAddressItems($address);
        if (!count($items)) {
            return $this;
        }
        $quote = $address->getQuote();
        if (Plus_Espaypaymentmethod_Model_Paymentmethod::canApply($address)) {
            $exist_amount = $quote->getEspayFeeAmount();
            $fee = Plus_Espaypaymentmethod_Model_Paymentmethod::getFee($address);
            $balance = $fee - $exist_amount;
            $address->setEspayFeeAmount($balance);
            $address->setBaseEspayFeeAmount($balance);
            $quote->setEspayFeeAmount($balance);
            $address->setGrandTotal(floatval($address->getGrandTotal()) + floatval($address->getEspayFeeAmount()));
            $address->setBaseGrandTotal($address->getBaseGrandTotal() + $address->getBaseEspayFeeAmount());
        }else {
          $address->setEspayFeeAmount(0);
          $address->setBaseEspayFeeAmount(0);
          $quote->setEspayFeeAmount(0);

        }
        return $this;
    }

    /**
     * Add fee information to address
     *
     * @param Mage_Sales_Model_Quote_Address $address
     * @return Magentix_Fee_Model_Sales_Quote_Address_Total_Fee
     */
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
       $amount = $address->getEspayFeeAmount();
        $address->addTotal(array(
            'code' => $this->getCode(),
            'title' => Mage::helper('espaypaymentmethod/data')->getTrxFeeLabel(),
            'value' => $amount
        ));
        return $this;
    }
}

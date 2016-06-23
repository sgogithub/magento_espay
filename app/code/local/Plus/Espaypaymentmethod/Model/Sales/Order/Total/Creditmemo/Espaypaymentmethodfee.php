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
class Plus_Espaypaymentmethod_Model_Sales_Order_Total_Creditmemo_Espaypaymentmethodfee extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    /**
     * Collect credit memo total
     *
     * @param Mage_Sales_Model_Order_Creditmemo $creditmemo
     * @return Magentix_Fee_Model_Sales_Order_Total_Creditmemo_Fee
     */
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        #die();
        $order = $creditmemo->getOrder();
        if($order->getEspayFeeAmountInvoiced() > 0) {
            $feeAmountLeft = $order->getEspayFeeAmountInvoiced() - $order->getEspayFeeAmountRefunded();
            $basefeeAmountLeft = $order->getBaseEspayFeeAmountInvoiced() - $order->getBaseEspayFeeAmountRefunded();
            if ($basefeeAmountLeft > 0) {
                $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $feeAmountLeft);
                $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $basefeeAmountLeft);
                $creditmemo->setEspayFeeAmount($feeAmountLeft);
                $creditmemo->setBaseEspayFeeAmount($basefeeAmountLeft);
            }
        } else {
            $feeAmount = $order->getEspayFeeAmountInvoiced();
            $basefeeAmount = $order->getEspayBaseFeeAmountInvoiced();
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $feeAmount);
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $basefeeAmount);
            $creditmemo->setEspayFeeAmount($feeAmount);
            $creditmemo->setBaseEspayFeeAmount($basefeeAmount);
        }
        return $this;
    }
}

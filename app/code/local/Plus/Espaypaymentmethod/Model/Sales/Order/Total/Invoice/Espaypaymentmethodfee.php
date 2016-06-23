<?php
class Plus_Espaypaymentmethod_Model_Sales_Order_Total_Invoice_Espaypaymentmethodfee extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    /**
     * Collect invoice total
     *
     * @param Mage_Sales_Model_Order_Invoice $invoice
     * @return Magentix_Fee_Model_Sales_Order_Total_Invoice_Fee
     */
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {

        $order = $invoice->getOrder();
        $feeAmountLeft = $order->getEspayFeeAmount() - $order->getEspayFeeAmountInvoiced();
        $baseFeeAmountLeft = $order->getBaseEspayFeeAmount() - $order->getBaseEspayFeeAmountInvoiced();
        if (abs($baseFeeAmountLeft) < $invoice->getBaseGrandTotal()) {
            $invoice->setGrandTotal($invoice->getGrandTotal() + $feeAmountLeft);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $baseFeeAmountLeft);
        } else {
            $feeAmountLeft = $invoice->getGrandTotal() * -1;
            $baseFeeAmountLeft = $invoice->getBaseGrandTotal() * -1;
            $invoice->setGrandTotal(0);
            $invoice->setBaseGrandTotal(0);
        }
        $invoice->setEspayFeeAmount($feeAmountLeft);
        $invoice->setBaseEspayFeeAmount($baseFeeAmountLeft);
        return $this;
    }
}
?>

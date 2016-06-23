<?php
$installer = $this;

$installer->startSetup();
$attributeFee = array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'nullable'  => false,
    'length'    => '10,2',
    'after'     => null, // column name to insert new column after
    'comment'   => 'Title'
);
$installer
->addAttribute('order','espay_fee_amount',$attributeFee);
$installer
->addAttribute('order','base_espay_fee_amount',$attributeFee);

$installer
->addAttribute('quote_address','espay_fee_amount',$attributeFee);
$installer
->addAttribute('quote_address','base_espay_fee_amount',$attributeFee);

$installer
->addAttribute('order','espay_fee_amount_invoiced',$attributeFee);
$installer
->addAttribute('order','base_espay_fee_amount_invoiced',$attributeFee);


$installer
->addAttribute('invoice','espay_fee_amount',$attributeFee);
$installer
->addAttribute('invoice','base_espay_fee_amount',$attributeFee);

$installer
->addAttribute('order','espay_fee_amount_refunded',$attributeFee);
$installer
->addAttribute('order','base_espay_fee_amount_refunded',$attributeFee);

$installer
->addAttribute('creditmemo','espay_fee_amount',$attributeFee);
$installer
->addAttribute('creditmemo','base_espay_fee_amount',$attributeFee);




$installer->endSetup();

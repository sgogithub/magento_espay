<?php
$installer = $this;
$statusTable = $installer->getTable('sales/order_status');
$statusStateTable = $installer->getTable('sales/order_status_state');

$installer->startSetup();
$installer->run("
ALTER TABLE `{$installer->getTable('sales/quote_payment')}`
ADD `espay_payment_method` VARCHAR( 255 ) NOT NULL,
ADD `espay_payment_ref` VARCHAR( 255 ) NOT NULL;

ALTER TABLE `{$installer->getTable('sales/order_payment')}`
ADD `espay_payment_method` VARCHAR( 255 ) NOT NULL,
ADD `espay_payment_ref` VARCHAR( 255 ) NOT NULL;
");

/*
// Insert statuses
$installer->getConnection()->insertArray(
    $statusTable,
    array(
        'status',
        'label'
    ),
    array(
        array('status' => 'payment_accepted_espay', 'label' => 'Payment Accepted Via ESPay'),
    )
);

$installer->getConnection()->insertArray(
    $statusStateTable,
    array(
        'status',
        'state',
        'is_default'
    ),
    array(
        array(
            'status' => 'payment_accepted_espay',
            'state' => 'payment_accepted',
            'is_default' => 1
        ),

    )
);*/
$installer->endSetup();

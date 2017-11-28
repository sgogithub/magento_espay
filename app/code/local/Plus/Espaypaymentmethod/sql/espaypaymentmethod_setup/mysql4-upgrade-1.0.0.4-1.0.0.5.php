<?php

$installer = $this;
$statusTable = $installer->getTable('sales/order_status');
$statusStateTable = $installer->getTable('sales/order_status_state');

$installer->startSetup();

// Insert statuses
$installer->getConnection()->insertArray(
        $statusTable, array(
    'status',
    'label'
        ), array(
    array('status' => 'payment_accepted_espay_emoedikk2', 'label' => 'Payment Accepted Via ESPay EMOEDIKK2'),
    array('status' => 'payment_accepted_espay_emoedikk', 'label' => 'Payment Accepted Via ESPay EMOEDIKK'),
        )
);

$installer->getConnection()->insertArray(
        $statusStateTable, array(
    'status',
    'state',
    'is_default'
        ), array(
    array(
        'status' => 'payment_accepted_espay_emoedikk',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_emoedikk2',
        'state' => 'processing',
        'is_default' => 0
    ),
        )
);
$installer->endSetup();

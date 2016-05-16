<?php
$installer = $this;
$statusTable = $installer->getTable('sales/order_status');
$statusStateTable = $installer->getTable('sales/order_status_state');

$installer->startSetup();

// Insert statuses
$installer->getConnection()->insertArray(
    $statusTable,
    array(
        'status',
        'label'
    ),
    array(
        array('status' => 'payment_accepted_espay', 'label' => 'Payment Accepted Via ESPay'),
        array('status' => 'payment_review_espay', 'label' => 'Payment Review'),
        array('status' => 'payment_canceled_espay', 'label' => 'Payment Canceled'),
        array('status' => 'payment_reversal_espay', 'label' => 'Payment Reversal'),
        array('status' => 'payment_completed_espay', 'label' => 'Payment Completed'),
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
            'state' => 'processing',
            'is_default' => 0
        ),
        array(
            'status' => 'payment_review_espay',
            'state' => 'processing',
            'is_default' => 0
        ),
        array(
            'status' => 'payment_canceled_espay',
            'state' => 'processing',
            'is_default' => 0
        ),
        array(
            'status' => 'payment_reversal_espay',
            'state' => 'processing',
            'is_default' => 0
        ),
        array(
            'status' => 'payment_completed_espay',
            'state' => 'processing',
            'is_default' => 0
        ),

    )
);
$installer->endSetup();

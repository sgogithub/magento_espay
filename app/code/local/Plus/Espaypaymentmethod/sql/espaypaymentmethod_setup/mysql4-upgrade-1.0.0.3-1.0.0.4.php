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
    array('status' => 'payment_accepted_espay_bcaatm', 'label' => 'Payment Accepted Via ESPay BCA VA Online'),
    array('status' => 'payment_accepted_espay_bcaklikpay', 'label' => 'Payment Accepted Via ESPay BCA KlikPay'),
    array('status' => 'payment_accepted_espay_xltunai', 'label' => 'Payment Accepted Via ESPay XL TUNAI'),
    array('status' => 'payment_accepted_espay_biiatm', 'label' => 'Payment Accepted Via ESPay ATM MULTIBANK'),
    array('status' => 'payment_accepted_espay_bnidbo', 'label' => 'Payment Accepted Via ESPay BNI Debit Online'),
    array('status' => 'payment_accepted_espay_epaybri', 'label' => 'Payment Accepted Via ESPay e-Pay BRI'),
    array('status' => 'payment_accepted_espay_briatm', 'label' => 'Payment Accepted Via ESPay BRI ATM'),
    array('status' => 'payment_accepted_espay_danamonob', 'label' => 'Payment Accepted Via ESPay Danamon Online Banking'),
    array('status' => 'payment_accepted_espay_danamonatm', 'label' => 'Payment Accepted Via ESPay ATM Danamon'),
    array('status' => 'payment_accepted_espay_dkiib', 'label' => 'Payment Accepted Via ESPay DKI IB'),
    array('status' => 'payment_accepted_espay_mandirisms', 'label' => 'Payment Accepted Via ESPay MANDIRI SMS'),
    array('status' => 'payment_accepted_espay_finpay195', 'label' => 'Payment Accepted Via ESPay Modern Channel'),
    array('status' => 'payment_accepted_espay_mandiriecash', 'label' => 'Payment Accepted Via ESPay MANDIRI E-CASH'),
    array('status' => 'payment_accepted_espay_creditcard', 'label' => 'Payment Accepted Via ESPay Credit Card Visa / Master'),
    array('status' => 'payment_accepted_espay_mandiriib', 'label' => 'Payment Accepted Via ESPay MANDIRI IB'),
    array('status' => 'payment_accepted_espay_maspionatm', 'label' => 'Payment Accepted Via ESPay ATM MASPION'),
    array('status' => 'payment_accepted_espay_mayapadaib', 'label' => 'Payment Accepted Via ESPay Mayapada Internet Banking'),
    array('status' => 'payment_accepted_espay_muamalatatm', 'label' => 'Payment Accepted Via ESPay MUAMALAT ATM'),
    array('status' => 'payment_accepted_espay_nobupay', 'label' => 'Payment Accepted Via ESPay Nobu Pay'),
    array('status' => 'payment_accepted_espay_permataatm', 'label' => 'Payment Accepted Via ESPay PERMATA ATM'),
    array('status' => 'payment_accepted_espay_permatapeb', 'label' => 'Payment Accepted Via ESPay Permata ebusiness'),
    array('status' => 'payment_accepted_espay_permatanetpay', 'label' => 'Payment Accepted Via ESPay PermataNet'),
        )
);

$installer->getConnection()->insertArray(
        $statusStateTable, array(
    'status',
    'state',
    'is_default'
        ), array(
    array(
        'status' => 'payment_accepted_espay_bcaatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_bcaklikpay',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_xltunai',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_biiatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_bnidbo',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_epaybri',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_briatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_danamonob',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_danamonatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_dkiib',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_mandirisms',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_finpay195',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_mandiriecash',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_creditcard',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_mandiriib',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_maspionatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_mayapadaib',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_muamalatatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_nobupay',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_permataatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_permatapeb',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'payment_accepted_espay_permatanetpay',
        'state' => 'processing',
        'is_default' => 0
    ),
        )
);
$installer->endSetup();

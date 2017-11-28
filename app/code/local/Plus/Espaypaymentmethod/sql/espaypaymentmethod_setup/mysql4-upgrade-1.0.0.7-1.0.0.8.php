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
    array('status' => 'accpt_espay_bcaatm', 'label' => 'ESPay BCA VA Online'),
    array('status' => 'accpt_espay_bcaklikpay', 'label' => 'ESPay BCA KlikPay'),
    array('status' => 'accpt_espay_xltunai', 'label' => 'ESPay XL TUNAI'),
    array('status' => 'accpt_espay_biiatm', 'label' => 'ESPay ATM MULTIBANK'),
    array('status' => 'accpt_espay_bnidbo', 'label' => 'ESPay BNI Debit Online'),
    array('status' => 'accpt_espay_epaybri', 'label' => 'ESPay e-Pay BRI'),
    array('status' => 'accpt_espay_briatm', 'label' => 'ESPay BRI ATM'),
    array('status' => 'accpt_espay_danamonob', 'label' => 'ESPay Danamon Online Banking'),
    array('status' => 'accpt_espay_danamonatm', 'label' => 'ESPay ATM Danamon'),
    array('status' => 'accpt_espay_dkiib', 'label' => 'ESPay DKI IB'),
    array('status' => 'accpt_espay_mandirisms', 'label' => 'ESPay MANDIRI SMS'),
    array('status' => 'accpt_espay_finpay195', 'label' => 'ESPay Modern Channel'),
    array('status' => 'accpt_espay_mandiriecash', 'label' => 'ESPay MANDIRI E-CASH'),
    array('status' => 'accpt_espay_creditcard', 'label' => 'ESPay Credit Card Visa / Master'),
    array('status' => 'accpt_espay_mandiriib', 'label' => 'ESPay MANDIRI IB'),
    array('status' => 'accpt_espay_mandiriatm', 'label' => 'ESPay MANDIRI VA'),
    array('status' => 'accpt_espay_maspionatm', 'label' => 'ESPay ATM MASPION'),
    array('status' => 'accpt_espay_mayapadaib', 'label' => 'ESPay Mayapada Internet Banking'),
    array('status' => 'accpt_espay_muamalatatm', 'label' => 'ESPay MUAMALAT ATM'),
    array('status' => 'accpt_espay_nobupay', 'label' => 'ESPay Nobu Pay'),
    array('status' => 'accpt_espay_permataatm', 'label' => 'ESPay PERMATA ATM'),
    array('status' => 'accpt_espay_permatapeb', 'label' => 'ESPay Permata ebusiness'),
    array('status' => 'accpt_espay_permatanetpay', 'label' => 'ESPay PermataNet'),
    array('status' => 'accpt_espay_emoedikk2', 'label' => 'ESPay EMOEDIKK2'),
    array('status' => 'accpt_espay_emoedikk', 'label' => 'ESPay EMOEDIKK'),
        )
);

$installer->getConnection()->insertArray(
        $statusStateTable, array(
    'status',
    'state',
    'is_default'
        ), array(
    array(
        'status' => 'accpt_espay_bcaatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_bcaklikpay',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_xltunai',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_biiatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_bnidbo',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_epaybri',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_briatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_danamonob',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_danamonatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_dkiib',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_mandirisms',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_finpay195',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_mandiriecash',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_creditcard',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_mandiriib',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_mandiriatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_maspionatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_mayapadaib',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_muamalatatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_nobupay',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_permataatm',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_permatapeb',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_permatanetpay',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_emoedikk',
        'state' => 'processing',
        'is_default' => 0
    ),
    array(
        'status' => 'accpt_espay_emoedikk2',
        'state' => 'processing',
        'is_default' => 0
    ),
        )
);

$installer->endSetup();

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
ADD `espay_payment_ref` VARCHAR( 255 ) NOT NULL
");
$installer->endSetup();

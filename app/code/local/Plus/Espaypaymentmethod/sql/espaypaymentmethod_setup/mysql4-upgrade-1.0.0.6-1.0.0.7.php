<?php

$installer = $this;
$statusTable = $installer->getTable('sales/order_status');
$statusStateTable = $installer->getTable('sales/order_status_state');

$installer->startSetup();

// Insert statuses

$installer->endSetup();

<?php
$sql= array();

$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ . 'customer` ADD `ref_sage` TEXT NULL DEFAULT NULL;';
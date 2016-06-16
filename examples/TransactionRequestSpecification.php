<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\TransactionRequestSpecification;

$oTransactionRequestSpecification = new TransactionRequestSpecification('CHANGEME', __DIR__ . '/../tests/test.pem');
$oResponse = $oTransactionRequestSpecification
    ->putInTestMode()
    ->perform('ideal');

var_dump($oResponse);

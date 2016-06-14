<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\TransactionRequestSpecification;

$oTransactionRequestSpecification = new TransactionRequestSpecification('CHANGEME', __DIR__ . '/../tests/test.pem');
$oResponse = $oTransactionRequestSpecification
    ->perform('ideal', 2);

var_dump($oResponse);

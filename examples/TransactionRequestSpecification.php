<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\TransactionRequestSpecification;
use \SeBuDesign\Buckaroo\Helpers\ServiceHelper;

$oTransactionRequestSpecification = new TransactionRequestSpecification('CHANGEME', __DIR__ . '/../tests/test.pem');
$oResponse = $oTransactionRequestSpecification
    ->putInTestMode()
    ->setService(ServiceHelper::SERVICE_IDEAL)
    ->perform();

var_dump($oResponse);

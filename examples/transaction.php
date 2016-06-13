<?php

include __DIR__ . "/../vendor/autoload.php";

use SeBuDesign\Buckaroo\BuckarooTransaction;

$oTransaction = new BuckarooTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');

$iDealResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(BuckarooTransaction::SERVICE_IDEAL)
    ->setIdealIssuer('RABONL2U')
    ->setInvoice('TEST_INVOICE')
    ->perform();

$masterCardResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(BuckarooTransaction::SERVICE_MASTERCARD)
    ->setInvoice('TEST_INVOICE')
    ->perform();

$paypalResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(BuckarooTransaction::SERVICE_PAYPAL)
    ->setInvoice('TEST_INVOICE')
    ->perform();

var_dump($iDealResponse, $masterCardResponse, $paypalResponse);
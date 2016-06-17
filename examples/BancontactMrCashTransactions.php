<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\BancontactMrCashTransaction;
use SeBuDesign\Buckaroo\Transaction;
use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

/**
 *
 * WITH BANCONTACT & MR CASH TRANSACTION CLASS
 *
 */

$oTransaction = new BancontactMrCashTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$response1 = $oTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setInvoice('TEST_INVOICE')
    ->perform();

/**
 *
 * WITH TRANSACTION CLASS
 *
 */

$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$response2 = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(ServiceHelper::SERVICE_BANCONTACT_MR_CASH)
    ->setInvoice('TEST_INVOICE')
    ->perform();

var_dump($response1, $response2);
<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\IdealTransaction;
use SeBuDesign\Buckaroo\Transaction;
use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

/**
 *
 * WITH IDEAL TRANSACTION CLASS
 *
 */

$oIdealTransaction = new IdealTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse2 = $oIdealTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setIdealIssuer(ServiceHelper::IDEAL_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

// Get all static iDeal banks
$staticIdealBanks = IdealTransaction::getStaticIdealBanks();

/**
 *
 * WITH TRANSACTION CLASS
 *
 */

$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(ServiceHelper::SERVICE_IDEAL)
    ->addServiceParameter('issuer', ServiceHelper::IDEAL_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

var_dump($iDealResponse, $iDealResponse2);
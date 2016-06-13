<?php

include __DIR__ . "/../vendor/autoload.php";

/**
 *
 * WITH IDEAL TRANSACTION CLASS
 *
 */
use SeBuDesign\Buckaroo\IdealTransaction;

$oIdealTransaction = new IdealTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse2 = $oIdealTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setIdealIssuer(IdealTransaction::BANK_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

// Get all static iDeal banks
$staticIdealBanks = IdealTransaction::getStaticIdealBanks();

/**
 *
 * WITH TRANSACTION CLASS
 *
 */
use SeBuDesign\Buckaroo\Transaction;

$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(Transaction::SERVICE_IDEAL)
    ->addServiceParameter('issuer', IdealTransaction::BANK_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();
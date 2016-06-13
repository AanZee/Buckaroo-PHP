<?php

include __DIR__ . "/../vendor/autoload.php";

use SeBuDesign\Buckaroo\Transaction;
use \SeBuDesign\Buckaroo\IdealTransaction;

$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');

// Transaction based
$iDealResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(Transaction::SERVICE_IDEAL)
    ->addServiceParameter('issuer', IdealTransaction::BANK_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

// Get all static iDeal banks
$staticIdealBanks = IdealTransaction::getStaticIdealBanks();

// Specific simplified ideal transaction
$oIdealTransaction = new IdealTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$oIdealTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setIdealIssuer(IdealTransaction::BANK_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

var_dump($iDealResponse);
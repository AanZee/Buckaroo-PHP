<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\IdealTransaction;
use SeBuDesign\Buckaroo\TransactionStatus;

$oIdealTransaction = new IdealTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse = $oIdealTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setIdealIssuer(IdealTransaction::BANK_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

$oIdealTransaction = new IdealTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse2 = $oIdealTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setIdealIssuer(IdealTransaction::BANK_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

$oTransactionStatus = new TransactionStatus('CHANGEME', __DIR__ . '/../tests/test.pem');
$transactionResponse = $oTransactionStatus
    ->putInTestMode()
    ->addTransactionByTransactionKey(
        $iDealResponse->getTransactionKey()
    )
    ->addTransactionByTransactionKey(
        $iDealResponse2->getTransactionKey()
    )
    ->addTransactionByTransactionKey(
        '74DBD9907FA74E30A9E9FB3EE4404E8X'
    )
    ->addTransactionByTransactionKey(
        '74DBD9907FA74E30A9E9FB3EE4404E8D'
    )
    ->perform();

var_dump($transactionResponse);

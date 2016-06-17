<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\IdealTransaction;
use SeBuDesign\Buckaroo\TransactionStatus;
use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

$oTransaction = new IdealTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse1 = $oTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setIdealIssuer(ServiceHelper::IDEAL_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

$oTransaction = new IdealTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$iDealResponse2 = $oTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setIdealIssuer(ServiceHelper::IDEAL_BUNQ)
    ->setInvoice('TEST_INVOICE')
    ->perform();

$oTransactionStatus = new TransactionStatus('CHANGEME', __DIR__ . '/../tests/test.pem');
$transactionResponse = $oTransactionStatus
    ->putInTestMode()
    ->addTransactionByTransactionKey(
        $iDealResponse1->getTransactionKey()
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

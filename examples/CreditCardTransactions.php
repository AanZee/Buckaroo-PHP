<?php

include __DIR__ . "/../vendor/autoload.php";

/**
 *
 * WITH CREDIT CARD TRANSACTION CLASS
 *
 */
use SeBuDesign\Buckaroo\CreditCardTransaction;

// Get all static credit card types
$staticCreditCardTypes = CreditCardTransaction::getStaticCreditCardTypes();

// Specific simplified credit card transaction
$oCreditCardTransaction = new CreditCardTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$creditCardResponse2 = $oCreditCardTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setInvoice('TEST_INVOICE')
    ->setService(Transaction::SERVICE_MASTERCARD)
//    ->setService(Transaction::SERVICE_VISA)
//    ->setService(Transaction::SERVICE_AMERICAN_EXPRESS)
//    ->setService(Transaction::SERVICE_MAESTRO)
//    ->setService(Transaction::SERVICE_VPAY)
//    ->setService(Transaction::SERVICE_VISA_ELECTRON)
//    ->setService(Transaction::SERVICE_CARTE_BLEUE)
//    ->setService(Transaction::SERVICE_CARTE_BANCAIRE)
//    ->setService(Transaction::SERVICE_DANKORT)

    // Optional; Code chosen by merchant to recognize the customer of this transaction
    ->setCustomerCode('test')
    // Optional; Start recurring payments
    ->setStartRecurrent(true)

    ->perform();

/**
 *
 * WITH TRANSACTION CLASS
 *
 */
use SeBuDesign\Buckaroo\Transaction;

// Credit card payment
$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$creditCardResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setInvoice('TEST_INVOICE')
    ->setService(Transaction::SERVICE_MASTERCARD)
//    ->setService(Transaction::SERVICE_VISA)
//    ->setService(Transaction::SERVICE_AMERICAN_EXPRESS)
//    ->setService(Transaction::SERVICE_MAESTRO)
//    ->setService(Transaction::SERVICE_VPAY)
//    ->setService(Transaction::SERVICE_VISA_ELECTRON)
//    ->setService(Transaction::SERVICE_CARTE_BLEUE)
//    ->setService(Transaction::SERVICE_CARTE_BANCAIRE)
//    ->setService(Transaction::SERVICE_DANKORT)

    // Optional; Code chosen by merchant to recognize the customer of this transaction
    ->addServiceParameter('customercode', 'a_unique_code')
    // Optional; Start recurring payments
    ->setStartRecurrent(true)

    ->perform();


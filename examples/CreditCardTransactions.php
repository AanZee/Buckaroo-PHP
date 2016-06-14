<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\Transaction;
use SeBuDesign\Buckaroo\Helpers\ServiceHelper;
use SeBuDesign\Buckaroo\CreditCardTransaction;

/**
 *
 * WITH CREDIT CARD TRANSACTION CLASS
 *
 */

// Get all static credit card types
$staticCreditCardTypes = CreditCardTransaction::getStaticCreditCardTypes();

// Specific simplified credit card transaction
$oCreditCardTransaction = new CreditCardTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$creditCardResponse2 = $oCreditCardTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setInvoice('TEST_INVOICE')
    ->setService(ServiceHelper::SERVICE_MASTERCARD)
//    ->setService(ServiceHelper::SERVICE_VISA)
//    ->setService(ServiceHelper::SERVICE_AMERICAN_EXPRESS)
//    ->setService(ServiceHelper::SERVICE_MAESTRO)
//    ->setService(ServiceHelper::SERVICE_VPAY)
//    ->setService(ServiceHelper::SERVICE_VISA_ELECTRON)
//    ->setService(ServiceHelper::SERVICE_CARTE_BLEUE)
//    ->setService(ServiceHelper::SERVICE_CARTE_BANCAIRE)
//    ->setService(ServiceHelper::SERVICE_DANKORT)

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

// Credit card payment
$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$creditCardResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setInvoice('TEST_INVOICE')
    ->setService(ServiceHelper::SERVICE_MASTERCARD)
//    ->setService(ServiceHelper::SERVICE_VISA)
//    ->setService(ServiceHelper::SERVICE_AMERICAN_EXPRESS)
//    ->setService(ServiceHelper::SERVICE_MAESTRO)
//    ->setService(ServiceHelper::SERVICE_VPAY)
//    ->setService(ServiceHelper::SERVICE_VISA_ELECTRON)
//    ->setService(ServiceHelper::SERVICE_CARTE_BLEUE)
//    ->setService(ServiceHelper::SERVICE_CARTE_BANCAIRE)
//    ->setService(ServiceHelper::SERVICE_DANKORT)

    // Optional; Code chosen by merchant to recognize the customer of this transaction
    ->addServiceParameter('customercode', 'a_unique_code')
    // Optional; Start recurring payments
    ->setStartRecurrent(true)

    ->perform();


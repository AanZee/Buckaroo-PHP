<?php

include __DIR__ . "/../vendor/autoload.php";

use SeBuDesign\Buckaroo\Transaction;
use SeBuDesign\Buckaroo\CreditCardTransaction;

$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');

// Credit card payment with specific card type
$creditCardResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(Transaction::SERVICE_MASTERCARD)
//    ->setService(Transaction::SERVICE_VISA)
//    ->setService(Transaction::SERVICE_AMERICAN_EXPRESS)
//    ->setService(Transaction::SERVICE_MAESTRO)
//    ->setService(Transaction::SERVICE_VPAY)
//    ->setService(Transaction::SERVICE_VISA_ELECTRON)
//    ->setService(Transaction::SERVICE_CARTE_BLEUE)
//    ->setService(Transaction::SERVICE_CARTE_BANCAIRE)
//    ->setService(Transaction::SERVICE_DANKORT)

    // Code chosen by merchant to recognize the customer of this transaction
//    ->addServiceParameter('customercode', 'a_unique_code')
        
    // Start recurring payments
//    ->setStartRecurrent(true)

    ->setInvoice('TEST_INVOICE')
    ->perform();

// Get all static credit card types
$staticCreditCardTypes = CreditCardTransaction::getStaticCreditCardTypes();

// Specific simplified credit card transaction
$oCreditCardTransaction = new CreditCardTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$creditCardResponse2 = $oCreditCardTransaction
    ->putInTestMode()
    ->setService(Transaction::SERVICE_VISA)
    ->setCustomerCode('test')
    ->setAmount(1.23)
    ->setInvoice('TEST_INVOICE')
    ->perform();

var_dump($staticCreditCardTypes, $creditCardResponse, $creditCardResponse2);
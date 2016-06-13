<?php

include __DIR__ . "/../vendor/autoload.php";

use SeBuDesign\Buckaroo\BuckarooTransaction;

$oTransaction = new BuckarooTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');

// Credit card payment with specific card type
$creditCardResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(BuckarooTransaction::SERVICE_MASTERCARD)
//    ->setService(BuckarooTransaction::SERVICE_VISA)
//    ->setService(BuckarooTransaction::SERVICE_AMERICAN_EXPRESS)
//    ->setService(BuckarooTransaction::SERVICE_MAESTRO)
//    ->setService(BuckarooTransaction::SERVICE_VPAY)
//    ->setService(BuckarooTransaction::SERVICE_VISA_ELECTRON)
//    ->setService(BuckarooTransaction::SERVICE_CARTE_BLEUE)
//    ->setService(BuckarooTransaction::SERVICE_CARTE_BANCAIRE)
//    ->setService(BuckarooTransaction::SERVICE_DANKORT)

    // Code chosen by merchant to recognize the customer of this transaction
//    ->addServiceParameter('customercode', 'a_unique_code')
        
    // Start recurring payments
//    ->setStartRecurrent(true)

    ->setInvoice('TEST_INVOICE')
    ->perform();

var_dump($creditCardResponse);
<?php

include __DIR__ . "/../vendor/autoload.php";

use SeBuDesign\Buckaroo\Transaction;

$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');

// Without service parameters
$paypalResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(Transaction::SERVICE_PAYPAL)
    ->setInvoice('TEST_INVOICE')
    ->perform();

// With service parameters
$paypalResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setService(Transaction::SERVICE_PAYPAL)

    // Email of the client so paypal will pre-fill the email address
    ->addServiceParameter('BuyerEmail', 'email@ofclient.com')

    // A custom page style for paypal
    ->addServiceParameter('PageStyle', 'http://link.to.page/style.css (max 30 char)')

    // A custom billing agreement
    ->addServiceParameter('BillingAgreementDescription', 'A description used for a billing agreement.')

    // A product name
    ->addServiceParameter('ProductName', 'A product / order id')

    // Start recurring payments
    ->setStartRecurrent(true)

    ->setInvoice('TEST_INVOICE')
    ->perform();

var_dump($paypalResponse);
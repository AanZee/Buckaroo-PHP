<?php

include __DIR__ . "/../vendor/autoload.php";
use SeBuDesign\Buckaroo\Transaction;
use SeBuDesign\Buckaroo\PayPalTransaction;
use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

/**
 *
 * WITH PAYPAL TRANSACTION CLASS
 *
 */

// With service parameters
$oTransaction = new PayPalTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$paypalResponse1 = $oTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setInvoice('TEST_INVOICE')

    // Optional; Email of the client so paypal will pre-fill the email address
    ->setCustomerEmail( 'email@ofclient.com')
    // Optional; A custom page style for paypal
    ->setPageStylesheetUrl('http://link.to/css (30 chars)')
    // Optional; A custom billing agreement
    ->setBillingAgreement('A description used for a billing agreement. (max 127 characters)')
    // Optional; A product name
    ->setProductName('A product / order id')
    // Optional; Start recurring payments
    ->setStartRecurrent(true)

    ->perform();

/**
 *
 * WITH TRANSACTION CLASS
 *
 */

// With service parameters
$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$paypalResponse2 = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setInvoice('TEST_INVOICE')
    ->setService(ServiceHelper::SERVICE_PAYPAL)

    // Optional; Email of the client so paypal will pre-fill the email address
    ->addServiceParameter('BuyerEmail', 'email@ofclient.com')
    // Optional; A custom page style for paypal
    ->addServiceParameter('PageStyle', 'http://link.to/css (30 chars)')
    // Optional; A custom billing agreement
    ->addServiceParameter('BillingAgreementDescription', 'A description used for a billing agreement. (max 127 characters)')
    // Optional; A product name
    ->addServiceParameter('ProductName', 'A product / order id')
    // Optional; Start recurring payments
    ->setStartRecurrent(true)

    ->perform();

var_dump($paypalResponse1, $paypalResponse2);
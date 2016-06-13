<?php

include __DIR__ . "/../vendor/autoload.php";

/**
 *
 * WITH PAYPAL TRANSACTION CLASS
 *
 */
use SeBuDesign\Buckaroo\PayPalTransaction;

// With service parameters
$oTransaction = new PayPalTransaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$paypalResponse2 = $oTransaction
    ->putInTestMode()
    ->setAmount(1.23)
    ->setInvoice('TEST_INVOICE')

    // Optional; Email of the client so paypal will pre-fill the email address
    ->setCustomerEmail( 'email@ofclient.com')
    // Optional; A custom page style for paypal
    ->setPageStylesheetUrl('http://link.to.page/style.css (max 30 characters)')
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
use SeBuDesign\Buckaroo\Transaction;

// With service parameters
$oTransaction = new Transaction('CHANGEME', __DIR__ . '/../tests/test.pem');
$paypalResponse = $oTransaction
    ->putInTestMode()
    ->setAmountDebit(1.23)
    ->setInvoice('TEST_INVOICE')
    ->setService(Transaction::SERVICE_PAYPAL)

    // Optional; Email of the client so paypal will pre-fill the email address
    ->addServiceParameter('BuyerEmail', 'email@ofclient.com')
    // Optional; A custom page style for paypal
    ->addServiceParameter('PageStyle', 'http://link.to.page/style.css (max 30 characters)')
    // Optional; A custom billing agreement
    ->addServiceParameter('BillingAgreementDescription', 'A description used for a billing agreement. (max 127 characters)')
    // Optional; A product name
    ->addServiceParameter('ProductName', 'A product / order id')
    // Optional; Start recurring payments
    ->setStartRecurrent(true)

    ->perform();


<?php

namespace SeBuDesign\Buckaroo;

use LinkORB\Buckaroo\SOAP;
use SeBuDesign\Buckaroo\Soap\BuckarooBaseSoap;

class BuckarooTransaction extends BuckarooBaseSoap
{
    /**
     * Set the currency of the transaction
     *
     * @param string $sCurrency The chosen currency
     *
     * @return $this
     */
    public function setCurrency($sCurrency)
    {
        $this->oRequestBody->Currency = $sCurrency;

        return $this;
    }

    /**
     * Set the debit amount
     * 
     * @param float $fAmountDebit The amount a person has to pay
     *
     * @return $this
     */
    public function setAmountDebit($fAmountDebit)
    {
        $this->oRequestBody->AmountDebit = $fAmountDebit;

        return $this;
    }

    /**
     * Set the credit amount
     * 
     * @param float $fAmountCredit The amount a person has to get
     *
     * @return $this
     */
    public function setAmountCredit($fAmountCredit)
    {
        $this->oRequestBody->AmountCredit = $fAmountCredit;

        return $this;
    }

    public function perform()
    {
        // Create the message body (actual request)
        $this->oRequestBody = new SOAP\Body();
        $this->oRequestBody->Currency = 'EUR';
        $this->oRequestBody->AmountDebit = 1.34;
        $this->oRequestBody->Invoice = 'DNK_PHP_1';
        $this->oRequestBody->Description = 'Example description for this request';
        $this->oRequestBody->ReturnURL = 'http://www.linkorb.com/';
        $this->oRequestBody->StartRecurrent = FALSE;
        // Specify which service / action we are calling
        $this->oRequestBody->Services = new SOAP\Services();
        $this->oRequestBody->Services->Service
            = new SOAP\Service('ideal', 'Pay', 2);
        // Add parameters for this service
        $this->oRequestBody->Services->Service->RequestParameter
            = new SOAP\RequestParameter('issuer', 'RABONL2U');
        // Optionally pass the client ip-address for logging
        $this->oRequestBody->ClientIP = new SOAP\IPAddress('123.123.123.123');
        
        return $this->call('transaction');
    }
}
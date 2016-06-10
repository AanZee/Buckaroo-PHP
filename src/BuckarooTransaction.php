<?php

namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionRequestException;
use SeBuDesign\Buckaroo\Soap\BuckarooBaseSoap;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Transaction as BuckarooSoapTransaction;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Common as BuckarooSoapCommon;

class BuckarooTransaction extends BuckarooBaseSoap
{
    const SERVICE_IDEAL = 'ideal';

    /**
     * BuckarooTransaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo website key
     * @param string $sPemPath The path to the PEM file
     *
     */
    public function __construct($sWebsiteKey, $sPemPath)
    {
        $this->setWebsiteKey($sWebsiteKey);
        $this->setPemPath($sPemPath);
        
        $this->oRequestBody = new BuckarooSoapTransaction\TransactionBody();
        $this->oRequestBody->Currency = 'EUR';
        $this->oRequestBody->StartRecurrent = FALSE;
    }
    
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

    /**
     * Set the invoice
     *
     * @param string $sInvoice The invoice number
     *
     * @return $this
     */
    public function setInvoice($sInvoice)
    {
        $this->oRequestBody->Invoice = $sInvoice;

        return $this;
    }

    /**
     * Set the transaction description
     *
     * @param string $sDescription The description of the transaction
     *
     * @return $this
     */
    public function setDescription($sDescription)
    {
        $this->oRequestBody->Description = $sDescription;

        return $this;
    }

    /**
     * Set the return url
     *
     * @param string $sReturnUrl The url to which the user should be returned to
     *
     * @return $this
     */
    public function setReturnUrl($sReturnUrl)
    {
        $this->oRequestBody->ReturnURL = $sReturnUrl;

        return $this;
    }

    /**
     * Set the transaction service, please use the constants defined at the top of this class
     *
     * @param string $sService The payment service
     * @param integer $iServiceVersion The payment service version
     * @param string $sAction The action
     *
     * @return $this
     */
    public function setService($sService, $iServiceVersion = 2, $sAction = 'Pay')
    {
        $this->oRequestBody->Services->Service
            = new BuckarooSoapTransaction\TransactionService($sService, $sAction, $iServiceVersion);

        return $this;
    }

    /**
     * Sets the iDeal issuer
     * 
     * @param string $sIssuer The iDeal issuer
     *
     * @return $this
     */
    public function setIdealIssuer($sIssuer)
    {
        $this->oRequestBody->Services->Service->RequestParameter
            = new BuckarooSoapCommon\RequestParameter('issuer', $sIssuer);
        
        return $this;
    }

    /**
     * Set the client IP
     * 
     * @param string $sClientIp The client IP
     *
     * @return $this
     */
    public function setClientIp($sClientIp)
    {
        $this->oRequestBody->ClientIP = new BuckarooSoapCommon\IPAddress($sClientIp);
        
        return $this;
    }

    /**
     * Perform the actual call
     *
     * @return array
     *
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionRequestException
     */
    public function perform()
    {
        if (is_null($this->oRequestBody->AmountDebit) && is_null($this->oRequestBody->AmountCredit)) {
            throw new BuckarooTransactionRequestException("At least one of the AmountDebit or AmountCredit should be set", 500);
        }
        
        if ($this->oRequestBody->AmountDebit === 0 || $this->oRequestBody->AmountCredit === 0) {
            throw new BuckarooTransactionRequestException("Amount should be greater than 0", 500);
        }

        if (is_null($this->oRequestBody->Services->Service)) {
            throw new BuckarooTransactionRequestException("You should choose a payment service");
        }
        
        if ($this->oRequestBody->Services->Service->Name == self::SERVICE_IDEAL && (is_null($this->oRequestBody->Services->Service->RequestParameter) || $this->oRequestBody->Services->Service->RequestParameter->Name != 'issuer')) {
            throw new BuckarooTransactionRequestException("You should choose an iDeal bank");
        }

        if (is_null($this->oRequestBody->Invoice)) {
            throw new BuckarooTransactionRequestException("You should provide an invoice number");
        }
        
        return $this->call('transaction');
    }
}
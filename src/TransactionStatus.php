<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionRequestException;
use SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionStatusRequestException;
use SeBuDesign\Buckaroo\Soap\BuckarooBaseSoap;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Common\AdditionalParameter;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Common\CustomParameter;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionStatus\TransactionStatusBody;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionStatus\TransactionStatusTransaction;

class TransactionStatus extends BuckarooBaseSoap
{
    /**
     * Transaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo website key
     * @param string $sPemPath    The path to the PEM file
     */
    public function __construct($sWebsiteKey, $sPemPath)
    {
        $this->setWebsiteKey($sWebsiteKey);
        $this->setPemPath($sPemPath);
        $this->addSoapOption('classmap', [
            'Body'               => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\TransactionStatus\\Body',
            'Transaction'        => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Transaction\\Body',
            'InvalidTransaction' => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Error\\InvalidTransactionError',
        ]);

        $this->oRequestBody = new TransactionStatusBody();
    }

    /**
     * Add a transaction to the request by transaction key
     *
     * @param string $sTransactionKey The transaction key
     *
     * @return $this
     */
    public function addTransactionByTransactionKey($sTransactionKey)
    {
        $oTransaction = new TransactionStatusTransaction();
        $oTransaction->Key = $sTransactionKey;

        return $this->addTransactionObject($oTransaction);
    }

    /**
     * Add a transaction to the request by invoice number
     *
     * @param string $sInvoice The invoice number
     *
     * @return $this
     */
    public function addTransactionByInvoiceNumber($sInvoice)
    {
        $oTransaction = new TransactionStatusTransaction();
        $oTransaction->Invoice = $sInvoice;

        return $this->addTransactionObject($oTransaction);
    }

    /**
     * Add a transaction to the request by custom parameter
     *
     * @param string $sName  The name of the custom parameter
     * @param mixed  $mValue The value of the custom parameter
     *
     * @return $this
     */
    public function addTransactionByCustomParameter($sName, $mValue)
    {
        $oCustomParameter = new CustomParameter($sName, $mValue);
        $oTransaction = new TransactionStatusTransaction();
        $oTransaction->CustomParameter = $oCustomParameter;

        return $this->addTransactionObject($oTransaction);
    }

    /**
     * Add a transaction to the request by additional parameter
     *
     * @param string $sName  The name of the additional parameter
     * @param mixed  $mValue The value of the additional parameter
     *
     * @return $this
     */
    public function addTransactionByAdditionalParameter($sName, $mValue)
    {
        $oAdditionalParameter = new AdditionalParameter($sName, $mValue);
        $oTransaction = new TransactionStatusTransaction();
        $oTransaction->AdditionalParameter = $oAdditionalParameter;

        return $this->addTransactionObject($oTransaction);
    }

    /**
     * Add a transaction object to the request
     *
     * @param \SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionStatus\TransactionStatusTransaction $oTransaction
     *
     * @return $this
     */
    public function addTransactionObject(TransactionStatusTransaction $oTransaction)
    {
        $this->oRequestBody->Transaction[] = $oTransaction;

        return $this;
    }

    /**
     * Perform the actual SOAP call
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface
     *
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooSoapException
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionStatusRequestException
     */
    public function perform()
    {
        if (is_null($this->oRequestBody->Transaction)) {
            throw new BuckarooTransactionStatusRequestException("At least one transaction should be added to the request", 500);
        }

        return $this->call('TransactionStatus');
    }
}
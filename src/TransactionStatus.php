<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionStatusRequestException;
use SeBuDesign\Buckaroo\Soap\BuckarooBaseSoap;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Common\Parameter;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionStatus\Body;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionStatus\Transaction as TransactionParameter;

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
            'Body'                 => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\TransactionStatus\\Body',
            'InvalidTransaction'   => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Error\\InvalidTransactionError',
            'Transaction'          => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Transaction\\Body',
            'Status'               => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Status\\Status',
            'StatusCode'           => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Status\\StatusCode',
            'StatusSubCode'        => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Status\\StatusCode',
            'ConsumerMessage'      => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\ConsumerMessage\\ConsumerMessage',
            'Services'             => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Service\\Services',
            'Service'              => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Service\\Service',
            'ResponseParameter'    => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Parameter\\Parameter',
            'RequiredAction'       => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Transaction\\RequiredAction',
            'CustomParameters'     => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Parameter\\CustomParameters',
            'CustomParameter'      => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Parameter\\Parameter',
            'AdditionalParameters' => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Parameter\\AdditionalParameters',
            'AdditionalParameter'  => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Parameter\\Parameter',
            'RequestErrors'        => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Error\\RequestErrors',
            'ParameterError'       => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Error\\Error',
            'CustomParameterError' => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Error\\Error',
            'ServiceError'         => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Error\\Error',
            'ActionError'          => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Common\\Error\\Error',
        ]);

        $this->oRequestBody = new Body();
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
        $oTransaction = new TransactionParameter();
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
        $oTransaction = new TransactionParameter();
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
        $oCustomParameter = new Parameter($sName, $mValue);
        $oTransaction = new TransactionParameter();
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
        $oAdditionalParameter = new Parameter($sName, $mValue);
        $oTransaction = new TransactionParameter();
        $oTransaction->AdditionalParameter = $oAdditionalParameter;

        return $this->addTransactionObject($oTransaction);
    }

    /**
     * Add a transaction object to the request
     *
     * @param TransactionParameter $oTransaction The transaction to get
     *
     * @return $this
     */
    public function addTransactionObject(TransactionParameter $oTransaction)
    {
        $this->oRequestBody->Transaction[] = $oTransaction;

        return $this;
    }

    /**
     * Perform the actual SOAP call
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionStatus\Body
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
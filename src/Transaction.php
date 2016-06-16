<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionRequestException;
use SeBuDesign\Buckaroo\Helpers\ServiceHelper;
use SeBuDesign\Buckaroo\Soap\BuckarooBaseSoap;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Transaction as BuckarooSoapTransaction;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Common as BuckarooSoapCommon;

class Transaction extends BuckarooBaseSoap
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
            'Body'                 => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\Transaction\\Body',
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

        $this->oRequestBody = new BuckarooSoapTransaction\Body();
        $this->oRequestBody->Currency = 'EUR';
        $this->oRequestBody->StartRecurrent = false;
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
     * Set the amount
     *
     * @param float $fAmount The amount a person has to pay
     *
     * @return $this
     */
    public function setAmount($fAmount)
    {
        $this->setAmountDebit($fAmount);

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
     * Set the order
     *
     * @param string $sOrder The order number
     *
     * @return $this
     */
    public function setOrder($sOrder)
    {
        $this->oRequestBody->Order = $sOrder;

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
     * Sets the url to which the user should be returned to when the payment got cancelled
     *
     * @param string $sReturnURLCancel The url
     *
     * @return $this
     */
    public function setReturnURLCancel($sReturnURLCancel)
    {
        $this->oRequestBody->ReturnURLCancel = $sReturnURLCancel;

        return $this;
    }

    /**
     * Sets the url to which the user should be returned to when an error occurred
     *
     * @param string $sReturnURLError The url
     *
     * @return $this
     */
    public function setReturnURLError($sReturnURLError)
    {
        $this->oRequestBody->ReturnURLError = $sReturnURLError;

        return $this;
    }

    /**
     * Sets the url to which the user should be returned to when the payment is rejected
     *
     * @param string $sReturnURLReject The url
     *
     * @return $this
     */
    public function setReturnURLReject($sReturnURLReject)
    {
        $this->oRequestBody->ReturnURLReject = $sReturnURLReject;

        return $this;
    }

    /**
     * Sets the url to which the payment status should be pushed to
     *
     * @param string $sPushURL The url
     *
     * @return $this
     */
    public function setPushURL($sPushURL)
    {
        $this->oRequestBody->PushURL = $sPushURL;

        return $this;
    }

    /**
     * Sets the url to which the payment status should be pushed to when it's a failure
     *
     * @param string $sPushURLFailure The url
     *
     * @return $this
     */
    public function setPushURLFailure($sPushURLFailure)
    {
        $this->oRequestBody->PushURLFailure = $sPushURLFailure;

        return $this;
    }

    /**
     * Sets which services are excluded for the client, see Buckaroo docs for the format
     *
     * @param string $sServicesExcludedForClient The services
     *
     * @return $this
     */
    public function setServicesExcludedForClient($sServicesExcludedForClient)
    {
        $this->oRequestBody->ServicesExcludedForClient = $sServicesExcludedForClient;

        return $this;
    }

    /**
     * Sets which services are selectable for the client, see Buckaroo docs for the format
     *
     * @param string $sServicesSelectableByClient The services
     *
     * @return $this
     */
    public function setServicesSelectableByClient($sServicesSelectableByClient)
    {
        $this->oRequestBody->ServicesSelectableByClient = $sServicesSelectableByClient;

        return $this;
    }

    /**
     * Set the transaction service, please use the constants defined at the top of this class
     *
     * @param string  $sService        The payment service
     * @param integer $iServiceVersion The payment service version
     * @param string  $sAction         The action
     *
     * @return $this
     */
    public function setService($sService, $iServiceVersion = 2, $sAction = 'Pay')
    {
        $this->oRequestBody->Services->Service
            = new BuckarooSoapTransaction\Service($sService, $sAction, $iServiceVersion);

        return $this;
    }

    /**
     * Sets the client user agent
     *
     * @param string $sUserAgent The client user agent
     *
     * @return $this
     */
    public function setClientUserAgent($sUserAgent)
    {
        $this->oRequestBody->ClientUserAgent = $sUserAgent;

        return $this;
    }

    /**
     * Sets the original transaction key
     *
     * @param string $sOriginalTransactionKey The original transaction key
     *
     * @return $this
     */
    public function setOriginalTransactionKey($sOriginalTransactionKey)
    {
        $this->oRequestBody->OriginalTransactionKey = $sOriginalTransactionKey;

        return $this;
    }

    /**
     * Sets the original transaction reference
     *
     * @param string $sOriginalTransactionReference The original transaction reference
     *
     * @return $this
     */
    public function setOriginalTransactionReference($sOriginalTransactionReference)
    {
        $this->oRequestBody->OriginalTransactionReference = $sOriginalTransactionReference;

        return $this;
    }

    /**
     * Should the user continue on incomplete?
     *
     * @param boolean $bContinueOnIncomplete The actual boolean
     *
     * @return $this
     */
    public function setContinueOnIncomplete($bContinueOnIncomplete)
    {
        $this->oRequestBody->ContinueOnIncomplete = $bContinueOnIncomplete;

        return $this;
    }

    /**
     * Is this a recurring payment?
     *
     * @param boolean $bStartRecurrent The actual boolean
     *
     * @return $this
     */
    public function setStartRecurrent($bStartRecurrent)
    {
        $this->oRequestBody->StartRecurrent = $bStartRecurrent;

        return $this;
    }

    /**
     * Add a service parameter
     *
     * @param string $sName  The name of the service parameter
     * @param mixed  $mValue The service parameter value
     *
     * @return $this
     */
    public function addServiceParameter($sName, $mValue)
    {
        $this->oRequestBody->Services->Service->RequestParameter[]
            = new BuckarooSoapCommon\Parameter($sName, $mValue);

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
     * Add a custom parameter
     *
     * @param string $sName  The custom parameter key configured in the Buckaroo Payment Plaza
     * @param mixed  $mValue The value of the custom parameter
     *
     * @return $this
     */
    public function addCustomParameter($sName, $mValue)
    {
        $this->oRequestBody->CustomParameters->CustomParameter[]
            = new BuckarooSoapCommon\Parameter($sName, $mValue);

        return $this;
    }

    /**
     * Add an additional parameter
     *
     * @param string $sName  The additional parameter key configured in the Buckaroo Payment Plaza
     * @param mixed  $mValue The value of the additional parameter
     *
     * @return $this
     */
    public function addAdditionalParameter($sName, $mValue)
    {
        $this->oRequestBody->AdditionalParameters->AdditionalParameter[]
            = new BuckarooSoapCommon\Parameter($sName, $mValue);

        return $this;
    }

    /**
     * Perform the actual call
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction\Body
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

        if ($this->oRequestBody->Services->Service->Name == ServiceHelper::SERVICE_IDEAL && is_null($this->oRequestBody->Services->Service->RequestParameter)) {
            throw new BuckarooTransactionRequestException("You should choose an iDeal bank");
        }

        if ($this->oRequestBody->Services->Service->Name == ServiceHelper::SERVICE_IDEAL && !is_null($this->oRequestBody->Services->Service->RequestParameter) && is_array($this->oRequestBody->Services->Service->RequestParameter)) {
            $bHasIssuer = false;
            foreach ($this->oRequestBody->Services->Service->RequestParameter as $oRequestParameter) {
                if ($oRequestParameter->Name == 'issuer') {
                    $bHasIssuer = true;
                    break;
                }
            }

            if (!$bHasIssuer) {
                throw new BuckarooTransactionRequestException("You should choose an iDeal bank");
            }
        }

        if (is_null($this->oRequestBody->Invoice)) {
            throw new BuckarooTransactionRequestException("You should provide an invoice number");
        }

        return $this->call('TransactionRequest');
    }
}
<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Transaction;

class Body
{
    /**
     * The additional parameters
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Common\Parameter[]
     */
    public $AdditionalParameters;

    /**
     * The credit amount
     *
     * @var float
     */
    public $AmountCredit;

    /**
     * The debit amount
     *
     * @var float
     */
    public $AmountDebit;

    /**
     * The client ip address
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Common\IPAddress
     */
    public $ClientIP;

    /**
     * The client user agent
     *
     * @var string
     */
    public $ClientUserAgent;

    /**
     * Does the consumer may continue on incomplete?
     *
     * @var boolean
     */
    public $ContinueOnIncomplete;

    /**
     * The currency
     *
     * @var string
     */
    public $Currency;

    /**
     * The custom parameters
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Common\Parameter[]
     */
    public $CustomParameters;

    /**
     * The description of the transaction
     *
     * @var string
     */
    public $Description;

    /**
     * The invoice number of the transaction
     *
     * @var string
     */
    public $Invoice;

    /**
     * The order number of the transaction
     *
     * @var string
     */
    public $Order;

    /**
     * The original transaction key
     *
     * @var string
     */
    public $OriginalTransactionKey;

    /**
     * The original transaction reference
     *
     * @var string
     */
    public $OriginalTransactionReference;

    /**
     * The url to push the response to
     *
     * @var string
     */
    public $PushURL;

    /**
     * The url to push all the failure responses to
     *
     * @var string
     */
    public $PushURLFailure;

    /**
     * The url to which the consumer should return to
     *
     * @var string
     */
    public $ReturnURL;

    /**
     * The url to which the consumer should return to on a cancel
     *
     * @var string
     */
    public $ReturnURLCancel;

    /**
     * The url to which the consumer should return to on a error
     *
     * @var string
     */
    public $ReturnURLError;

    /**
     * The url to which the consumer should return to on a rejection
     *
     * @var string
     */
    public $ReturnURLReject;

    /**
     * The services
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Transaction\Services
     */
    public $Services;

    /**
     * The excluded services for the client
     *
     * @var string
     */
    public $ServicesExcludedForClient;

    /**
     * The selectable services for the client
     *
     * @var string
     */
    public $ServicesSelectableByClient;

    /**
     * Start a recurrent payment
     *
     * @var boolean
     */
    public $StartRecurrent;

    /**
     * Body constructor.
     */
    public function __construct()
    {
        $this->Services = new Services();
    }
}
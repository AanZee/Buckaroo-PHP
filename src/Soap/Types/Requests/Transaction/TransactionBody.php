<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Transaction;

class TransactionBody
{
    public $AdditionalParameters;
    public $AmountCredit;
    public $AmountDebit;
    public $ClientIP;
    public $ClientUserAgent;
    public $ContinueOnIncomplete;
    public $Currency;
    public $CustomParameters;
    public $Description;
    public $Invoice;
    public $Order;
    public $OriginalTransactionKey;
    public $OriginalTransactionReference;
    public $PushURL;
    public $PushURLFailure;
    public $ReturnURL;
    public $ReturnURLCancel;
    public $ReturnURLError;
    public $ReturnURLReject;
    public $Services;
    public $ServicesExcludedForClient;
    public $ServicesSelectableByClient;
    public $StartRecurrent;

    public function __construct()
    {
        $this->Services = new TransactionServices();
    }
}
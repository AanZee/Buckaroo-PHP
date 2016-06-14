<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionStatus;

use SeBuDesign\Buckaroo\Soap\Types\Requests\Common\AdditionalParameter;
use SeBuDesign\Buckaroo\Soap\Types\Requests\Common\CustomParameter;

class TransactionStatusTransaction
{
    /**
     * The transaction key
     *
     * @var string
     */
    public $Key;

    /**
     * The invoice number
     *
     * @var string
     */
    public $Invoice;

    /**
     * The custom parameters
     *
     * @var CustomParameter[]
     */
    public $CustomParameter;

    /**
     * The additional parameters
     *
     * @var AdditionalParameter[]
     */
    public $AdditionalParameter;
}
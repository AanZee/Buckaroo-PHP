<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionStatus;

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
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Common\Parameter[]
     */
    public $CustomParameter;

    /**
     * The additional parameters
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Common\Parameter[]
     */
    public $AdditionalParameter;
}
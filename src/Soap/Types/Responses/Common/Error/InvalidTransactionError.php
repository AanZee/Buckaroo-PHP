<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error;

class InvalidTransactionError
{
    /**
     * The invoice number
     *
     * @var string
     */
    protected $Invoice;

    /**
     * The transaction key
     *
     * @var string
     */
    protected $Key;

    /**
     * The error message
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\Error
     */
    protected $ErrorMessage;

    /**
     * Get the error code
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->Invoice;
    }

    /**
     * Get the transaction key
     *
     * @return string
     */
    public function getTransactionKey()
    {
        return $this->Key;
    }

    /**
     * Get the error message
     *
     * @return \\SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\Error
     */
    public function getErrorMessage()
    {
        return $this->ErrorMessage;
    }
}
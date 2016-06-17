<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionStatus;

use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\InvalidTransactionError;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface;

class Body implements BodyInterface
{
    /**
     * All of the transactions requested
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction\Body[]
     */
    protected $Transaction;

    /**
     * The error object
     *
     * @var InvalidTransactionError[]
     */
    protected $InvalidTransaction;

    /**
     * Get all the transactions
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction\Body[]
     */
    public function getTransactions()
    {
        if ($this->Transaction instanceof \SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction\Body) {
            $this->Transaction = [
                $this->Transaction,
            ];
        }

        return $this->Transaction;
    }

    /**
     * Get the transaction by transaction key
     *
     * @param string $sTransactionKey The transaction key
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction\Body
     */
    public function getTransactionByTransactionKey($sTransactionKey)
    {
        $mTransaction = false;

        foreach ($this->getTransactions() as $oTransaction) {
            if ($oTransaction->getTransactionKey() === $sTransactionKey) {
                $mTransaction = $oTransaction;
                break;
            }
        }

        return $mTransaction;
    }

    /**
     * Get all the invalid transactions
     *
     * @return InvalidTransactionError[]
     */
    public function getInvalidTransactions()
    {
        if ($this->InvalidTransaction instanceof InvalidTransactionError) {
            $this->InvalidTransaction = [
                $this->InvalidTransaction,
            ];
        }

        return $this->InvalidTransaction;
    }

    /**
     * Does the request have invalid transactions?
     *
     * @return bool
     */
    public function hasInvalidTransactions()
    {
        return ($this->InvalidTransaction !== null);
    }

    /**
     * Is the transaction key invalid?
     *
     * @param string $sTransactionKey The transaction key
     *
     * @return bool
     */
    public function isInvalidTransactionKey($sTransactionKey)
    {
        $bReturn = false;

        if ($this->hasInvalidTransactions()) {
            foreach ($this->getInvalidTransactions() as $oInvalidTransaction) {
                if ($oInvalidTransaction->getTransactionKey() === $sTransactionKey) {
                    $bReturn = true;
                    break;
                }
            }
        }

        return $bReturn;
    }

    /**
     * Is a certain invoice number invalid?
     *
     * @param string $sInvoiceNumber The invoice number
     *
     * @return bool
     */
    public function isInvalidInvoiceNumber($sInvoiceNumber)
    {
        $bReturn = false;

        if ($this->hasInvalidTransactions()) {
            foreach ($this->getInvalidTransactions() as $oInvalidTransaction) {
                if ($oInvalidTransaction->getInvoiceNumber() === $sInvoiceNumber) {
                    $bReturn = true;
                    break;
                }
            }
        }

        return $bReturn;
    }

    /**
     * Does the response have errors
     *
     * We don't check the errors here because we want to be able to parse the result if only one transaction key does
     * not exists
     *
     * @return bool
     */
    public function hasErrors()
    {
        return false;
    }
}

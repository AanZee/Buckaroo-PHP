<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\InvalidTransactionError;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface;

class Body implements BodyInterface
{
    /**
     * Does the response have errors
     *
     * We don't check the errors here because we want to be able to parse the result if only one transaction key does not exists
     * 
     * @return bool
     */
    public function hasErrors()
    {
        return false;
    }
}

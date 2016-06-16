<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification;

class TransactionRequestSpecificationBody
{
    /**
     * The requested service
     *
     * @var Services
     */
    public $Services;

    /**
     * TransactionRequestSpecificationBody constructor.
     */
    public function __construct()
    {
        $this->Services = new Services();
    }
}
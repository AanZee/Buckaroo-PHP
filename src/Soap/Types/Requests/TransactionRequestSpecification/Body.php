<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification;

class Body
{
    /**
     * The requested service
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification\Services
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
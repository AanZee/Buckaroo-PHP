<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification;

class RequestedService
{
    /**
     * The requested service name
     *
     * @var string
     */
    public $Name;

    /**
     * The requested service version
     *
     * @var string
     */
    public $Version;

    /**
     * RequestedService constructor.
     *
     * @param string $sName    The service name
     * @param string $sVersion The service version
     */
    public function __construct($sName, $sVersion)
    {
        $this->Name = $sName;
        $this->Version = $sVersion;
    }
}
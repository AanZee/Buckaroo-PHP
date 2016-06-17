<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Transaction;

class Service
{
    /**
     * The request specific parameters
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Common\Parameter[]
     */
    public $RequestParameter;

    /**
     * The service name
     *
     * @var string
     */
    public $Name;

    /**
     * The service action
     *
     * @var string
     */
    public $Action;

    /**
     * The service version
     *
     * @var integer
     */
    public $Version;

    /**
     * Service constructor.
     *
     * @param string  $sName    The name of the service
     * @param string  $sAction  The action of the service
     * @param integer $iVersion The version of the serivce to use
     */
    public function __construct($sName, $sAction, $iVersion)
    {
        $this->Name = $sName;
        $this->Action = $sAction;
        $this->Version = $iVersion;
    }
}


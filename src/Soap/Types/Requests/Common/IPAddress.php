<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Common;

class IPAddress
{
    /**
     * The type of the IP address
     *
     * @var string
     */
    public $Type;

    /**
     * The actual IP address
     *
     * @var string
     */
    public $_;

    /**
     * IPAddress constructor.
     *
     * @param string $sAddress The actual IP address
     * @param string $sType    The type of the IP address
     */
    public function __construct($sAddress, $sType = 'IPv4')
    {
        $this->_ = $sAddress;
        $this->Type = $sType;
    }
}

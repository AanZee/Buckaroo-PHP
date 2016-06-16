<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification;

class LatestVersionOnlyBody
{
    /**
     * Use the latest versions only
     *
     * @var boolean
     */
    public $LatestVersionOnly;

    /**
     * LatestVersionOnlyBody constructor.
     *
     * @param bool $bUseLatestVersionsOnly Should Buckaroo only return the latest versions?
     */
    public function __construct($bUseLatestVersionsOnly = true)
    {
        $this->LatestVersionOnly = $bUseLatestVersionsOnly;
    }
}
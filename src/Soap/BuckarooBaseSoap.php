<?php

namespace SeBuDesign\Buckaroo\Soap;

use SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException;
use SoapClient;

class BuckarooBaseSoap extends SoapClient
{
    /**
     * The content of the PEM file
     *
     * @var string
     */
    protected $sPemData;

    /**
     * BuckarooBaseSoap constructor.
     *
     * @param string $sPathToPem The path to the PEM file
     *
     * @throws BuckarooArgumentException
     */
    public function __construct($sPathToPem)
    {
        if (!file_exists($sPathToPem)) {
            throw new BuckarooArgumentException("The pem ({$sPathToPem}) does not exists");
        }

        $this->sPemData = file_get_contents($sPathToPem);
    }
}
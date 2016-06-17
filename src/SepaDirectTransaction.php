<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

class SepaDirectTransaction extends Transaction
{
    /**
     * PayPalTransaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo website key
     * @param string $sPemPath    The path to the PEM file
     */
    public function __construct($sWebsiteKey, $sPemPath)
    {
        parent::__construct($sWebsiteKey, $sPemPath);

        $this->setService(ServiceHelper::SERVICE_SEPA_DIRECT_DEBIT);
    }
}
<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Soap\BuckarooBaseSoap;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification\RequestedService;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification\TransactionRequestSpecificationBody;

class TransactionRequestSpecification extends BuckarooBaseSoap
{
    /**
     * Transaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo website key
     * @param string $sPemPath    The path to the PEM file
     */
    public function __construct($sWebsiteKey, $sPemPath)
    {
        $this->setWebsiteKey($sWebsiteKey);
        $this->setPemPath($sPemPath);
        $this->addSoapOption('classmap', [
            'Body'               => 'SeBuDesign\\Buckaroo\\Soap\\Types\\Responses\\TransactionRequestSpecification\\Body',
        ]);

        $this->oRequestBody = new TransactionRequestSpecificationBody();
    }

    /**
     * Perform the actual SOAP call
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface
     *
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooSoapException
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooTransactionStatusRequestException
     */
    public function perform($sName, $sVersion)
    {
        $oRequestedService = new RequestedService($sName, $sVersion);

        $this->oRequestBody->Services->RequestedService = $oRequestedService;
        
        return $this->call('TransactionRequestSpecification');
    }
}
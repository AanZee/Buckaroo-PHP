<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Soap\BuckarooBaseSoap;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification\LatestVersionOnlyBody;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification\RequestedService;
use SeBuDesign\Buckaroo\Soap\Types\Requests\TransactionRequestSpecification\Body;

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

        $this->oRequestBody = new Body();
        $this->aOtherRequestBodies = [
            new LatestVersionOnlyBody(),
        ];
    }

    /**
     * Set the service to get the description of
     *
     * @param string $sName The name of the service
     * @param null|integer $sVersion The version of the service
     *
     * @return $this
     */
    public function setService($sName, $sVersion = null)
    {
        $oRequestedService = new RequestedService($sName, $sVersion);

        $this->oRequestBody->Services->RequestedService = $oRequestedService;
        
        if (!is_null($sVersion)) {
            $this->useLatestVersion(false);
        }
        
        return $this;
    }

    /**
     * Should Buckaroo only return the latest versions?
     *
     * @param boolean $bLatestVersion The boolean to use the latest version; default true
     */
    public function useLatestVersion($bLatestVersion)
    {
        foreach ($this->aOtherRequestBodies as $oRequestBody) {
            if ($oRequestBody instanceof LatestVersionOnlyBody) {
                $oRequestBody->LatestVersionOnly = $bLatestVersion;
                break;
            }
        }
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
    public function perform()
    {
        return $this->call('TransactionRequestSpecification');
    }
}
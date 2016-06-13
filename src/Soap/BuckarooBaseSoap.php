<?php

namespace SeBuDesign\Buckaroo\Soap;

use SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException;
use LinkORB\Buckaroo\SoapClientWSSEC as BuckarooSoapClient;
use SeBuDesign\Buckaroo\Exceptions\BuckarooSoapException;
use SeBuDesign\Buckaroo\Soap\Types\Requests as BuckarooSoapTypes;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface;
use SoapHeader;

class BuckarooBaseSoap
{
    /**
     * The path to the PEM file
     *
     * @var string
     */
    protected $sPemPath;

    /**
     * The SOAP end point
     *
     * @var string
     */
    protected $sSoapEndPoint = 'https://checkout.buckaroo.nl/soap/soap.svc';

    /**
     * The Buckaroo channel
     *
     * @var string
     */
    protected $sChannel = 'Web';

    /**
     * The Buckaroo locale
     *
     * @var string
     */
    protected $sLocale = 'nl-NL';

    /**
     * Is the service in testing mode?
     *
     * @var boolean
     */
    protected $bIsTesting = false;

    /**
     * The Buckaroo SOAP client
     *
     * @var BuckarooSoapClient
     */
    protected $oSoapClient;

    /**
     * The Buckaroo website key
     *
     * @var string
     */
    protected $sWebsiteKey;

    protected $oRequestBody;

    /**
     * The SOAP options for the Buckaroo SOAP client
     *
     * @var array
     */
    protected $aSoapOptions = [
        'trace'    => 1,
    ];

    /**
     * Put the SOAP Client in test mode
     *
     * @return $this
     */
    public function putInTestMode()
    {
        $this->bIsTesting = true;
        $this->sSoapEndPoint = 'https://testcheckout.buckaroo.nl/soap/soap.svc';

        return $this;
    }

    /**
     * Check if we are in testing mode
     *
     * @return bool
     */
    public function isInTestMode()
    {
        return $this->bIsTesting;
    }

    /**
     * Set the PEM file path
     *
     * @param string $sPathToPem The path to the PEM file
     *
     * @return $this
     *
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException
     */
    protected function setPemPath($sPathToPem)
    {
        if (!file_exists($sPathToPem)) {
            throw new BuckarooArgumentException("The PEM ({$sPathToPem}) does not exists");
        }

        $this->sPemPath = $sPathToPem;

        return $this;
    }

    /**
     * Set the Buckaroo channel
     *
     * @param string $sChannel The Buckaroo channel
     *
     * @return $this
     */
    public function setBuckarooChannel($sChannel)
    {
        $this->sChannel = $sChannel;

        return $this;
    }

    /**
     * Set the Buckaroo website key
     *
     * @param string $sWebsiteKey The Buckaroo website key
     *
     * @return $this
     */
    protected function setWebsiteKey($sWebsiteKey)
    {
        $this->sWebsiteKey = $sWebsiteKey;

        return $this;
    }

    /**
     * Set the Buckaroo locale
     *
     * @param string $sLocale The Buckaroo locale
     *
     * @return $this
     */
    public function setLocale($sLocale)
    {
        $this->sLocale = $sLocale;

        return $this;
    }

    /**
     * Add or override SOAP options
     *
     * @param string $sOption The name of the option
     * @param mixed  $mValue  The value of the option
     *
     * @return $this
     */
    public function addSoapOption($sOption, $mValue)
    {
        $this->aSoapOptions[ $sOption ] = $mValue;

        return $this;
    }

    /**
     * Call a certain SOAP call
     *
     * @param string $sCall A valid Buckaroo call
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface
     *
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooSoapException
     */
    public function call($sCall)
    {
        if (!$this->sPemPath) {
            throw new BuckarooArgumentException("Missing PEM file");
        }

        if (!$this->sWebsiteKey) {
            throw new BuckarooArgumentException("Missing Buckaroo website key");
        }

        $this->oSoapClient = new BuckarooSoapClient("{$this->sSoapEndPoint}?wsdl", $this->aSoapOptions);
        $this->oSoapClient->loadPem($this->sPemPath);

        $this->addControlBlockHeaders();

        /** @var BodyInterface $oResult */
        $oResult = $this->oSoapClient->{$sCall}($this->oRequestBody);
        
        if ($oResult->hasErrors()) {
            throw new BuckarooSoapException("There are errors in your SOAP response, {$this->oSoapClient->__getLastResponse()}. The request XML was {$this->oSoapClient->__getLastRequest()}");
        }

        return $oResult;
    }

    /**
     * This method creates the SOAP client headers which are needed at every request for security purposes
     */
    protected function addControlBlockHeaders()
    {
        // Envelope and wrapper stuff
        $oMessageControlBlock = new BuckarooSoapTypes\Headers\MessageControlBlock();

        // Build MessageControlBlock
        $oMessageControlBlock->WebsiteKey = $this->sWebsiteKey;
        $oMessageControlBlock->Culture = $this->sLocale;
        $oMessageControlBlock->Channel = $this->sChannel;

        // Add the headers to the SOAP client
        $soapHeaders[] = new SOAPHeader(
            'https://checkout.buckaroo.nl/PaymentEngine/', 
            'MessageControlBlock',
            $oMessageControlBlock
        );
        $soapHeaders[] = new SOAPHeader(
            'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
            'Security',
            new BuckarooSoapTypes\Headers\SecurityType()
        );

        $this->oSoapClient->__setSoapHeaders($soapHeaders);
    }
}
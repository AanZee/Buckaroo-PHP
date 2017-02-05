<?php namespace SeBuDesign\Buckaroo\Soap;

use SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException;
use LinkORB\Buckaroo\SoapClientWSSEC;
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
     * @var \LinkORB\Buckaroo\SoapClientWSSEC
     */
    protected $oSoapClient;

    /**
     * The Buckaroo website key
     *
     * @var string
     */
    protected $sWebsiteKey;

    /**
     * The request body
     *
     * @var object
     */
    protected $oRequestBody;

    /**
     * If some variables are outside the default request body, use this to add it to the request
     *
     * @var array
     */
    protected $aOtherRequestBodies;

    /**
     * The SOAP options for the Buckaroo SOAP client
     *
     * @var array
     */
    protected $aSoapOptions = [
        'trace' => 1,
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
     * Set the WSDL file to load
     *
     * @param string $sWsdl The path/url to the WSDL
     *
     * @return $this
     */
    public function setWsdl($sWsdl)
    {
        $this->sSoapEndPoint = $sWsdl;

        return $this;
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

        $this->oSoapClient = new SoapClientWSSEC("{$this->sSoapEndPoint}?wsdl", $this->aSoapOptions);
        $this->oSoapClient->loadPem($this->sPemPath);

        $this->addControlBlockHeaders();

        try {
            /** @var BodyInterface $oResult */
            if (is_array($this->aOtherRequestBodies)) {
                $this->aOtherRequestBodies[] = $this->oRequestBody;
                $oResult = call_user_func_array([$this->oSoapClient, $sCall], $this->aOtherRequestBodies);
            } else {
                $oResult = $this->oSoapClient->{$sCall}($this->oRequestBody);
            }

            if ($oResult->hasErrors()) {
                throw new BuckarooSoapException("There are errors in your SOAP response, {$this->oSoapClient->__getLastResponse()}. The request XML was {$this->oSoapClient->__getLastRequest()}");
            }
        } catch (\SoapFault $oException) {
            $oSoapException = new BuckarooSoapException($oException->getMessage(), $oException->getCode());
            $oSoapException->setRequestHeaders($this->oSoapClient->__getLastRequestHeaders());
            $oSoapException->setRequestXml($this->oSoapClient->__getLastRequest());
            $oSoapException->setResponseHeaders($this->oSoapClient->__getLastResponseHeaders());
            $oSoapException->setResponseXml($this->oSoapClient->__getLastResponse());
            
            throw $oSoapException;
        }

        return $oResult;
    }

    /**
     * This method creates the SOAP client headers which are needed at every request for security purposes
     *
     * @return void
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
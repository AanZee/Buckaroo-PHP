<?php namespace SeBuDesign\Buckaroo\Exceptions;

use Exception;

class BuckarooSoapException extends Exception
{
    /**
     * The request XML
     *
     * @var string
     */
    protected $sRequestXml;

    /**
     * The request headers
     *
     * @var string
     */
    protected $sRequestHeaders;

    /**
     * The response XML
     *
     * @var string
     */
    protected $sResponseXml;

    /**
     * The response headers
     *
     * @var string
     */
    protected $sResponseHeaders;

    /**
     * Set the request XML
     *
     * @param string $sRequestXml The request XML
     *
     * @return void
     */
    public function setRequestXml($sRequestXml)
    {
        $this->sRequestXml = $sRequestXml;
    }

    /**
     * Set the request headers
     *
     * @param string $sRequestHeaders The request headers
     *
     * @return void
     */
    public function setRequestHeaders($sRequestHeaders)
    {
        $this->sRequestHeaders = $sRequestHeaders;
    }

    /**
     * Set the response XML
     *
     * @param string $sResponseXml The response XML
     *
     * @return void
     */
    public function setResponseXml($sResponseXml)
    {
        $this->sResponseXml = $sResponseXml;
    }

    /**
     * Set the response headers
     *
     * @param string $sResponseHeaders The response headers
     *
     * @return void
     */
    public function setResponseHeaders($sResponseHeaders)
    {
        $this->sResponseHeaders = $sResponseHeaders;
    }

    /**
     * Add the added data to the exception message
     *
     * @return string
     */
    public function __toString()
    {
        $sString = parent::__toString();

        if (!is_null($this->sRequestHeaders)) {
            $sString .= PHP_EOL . "Request Headers:" . PHP_EOL . $this->sRequestHeaders;
        }
        if (!is_null($this->sRequestXml)) {
            $sString .= PHP_EOL . "Request Xml:" . PHP_EOL . $this->sRequestXml;
        }
        if (!is_null($this->sResponseHeaders)) {
            $sString .= PHP_EOL . "Response Headers:" . PHP_EOL . $this->sResponseHeaders;
        }
        if (!is_null($this->sResponseXml)) {
            $sString .= PHP_EOL . "Response Xml:" . PHP_EOL . $this->sResponseXml;
        }

        return $sString;
    }
}
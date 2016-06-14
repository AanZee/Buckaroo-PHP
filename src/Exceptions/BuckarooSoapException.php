<?php

namespace SeBuDesign\Buckaroo\Exceptions;

use Exception;

class BuckarooSoapException extends Exception
{
    protected $sRequestXml;
    protected $sRequestHeaders;
    protected $sResponseXml;
    protected $sResponseHeaders;

    public function setRequestXml($sRequestXml)
    {
        $this->sRequestXml = $sRequestXml;
    }

    public function setRequestHeaders($sRequestHeaders)
    {
        $this->sRequestHeaders = $sRequestHeaders;
    }

    public function setResponseXml($sResponseXml)
    {
        $this->sResponseXml = $sResponseXml;
    }

    public function setResponseHeaders($sResponseHeaders)
    {
        $this->sResponseHeaders = $sResponseHeaders;
    }

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
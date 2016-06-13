<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service;

class Service
{
    /**
     * The name of the service
     *
     * @var string
     */
    protected $Name;

    /**
     * An array of response parameters
     *
     * @var ResponseParameter[]
     */
    protected $ResponseParameter;

    /**
     * Get the name of the service
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get all of the response parameters
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service\ResponseParameter[]
     */
    public function getResponseParameters()
    {
        if ($this->ResponseParameter instanceof ResponseParameter) {
            $this->ResponseParameter = [
                $this->ResponseParameter
            ];
        }
        
        return $this->ResponseParameter;
    }

    /**
     * Does the service has response parameters
     *
     * @return bool
     */
    public function hasResponseParameters()
    {
        return $this->ResponseParameter !== null;
    }

    /**
     * Does the response parameter exists
     *
     * @param string $sName The name of the response parameter
     *
     * @return bool
     */
    public function hasResponseParameter($sName)
    {
        $bHasResponseParameter = false;

        foreach ($this->getResponseParameters() as $oResponseParameter)
        {
            if ($oResponseParameter->getName() == $sName) {
                $bHasResponseParameter = true;
                break;
            }
        }

        return $bHasResponseParameter;
    }

    /**
     * Get the value of a response parameter
     *
     * @param string $sName The name of the response parameter
     *
     * @return mixed
     */
    public function getResponseParameter($sName)
    {
        $mResponseParameter = false;

        foreach ($this->getResponseParameters() as $oResponseParameter)
        {
            if ($oResponseParameter->getName() == $sName) {
                $mResponseParameter = $oResponseParameter->getValue();
                break;
            }
        }

        return $mResponseParameter;
    }
}
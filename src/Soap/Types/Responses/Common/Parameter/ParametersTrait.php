<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter;

trait ParametersTrait
{
    /**
     * Does the service has response parameters
     *
     * @return bool
     */
    public function hasResponseParameters()
    {
        return $this->getParameters() !== null;
    }

    /**
     * Does the parameter exists?
     *
     * @param string $sName The name of the parameter
     *
     * @return bool
     */
    public function hasParameter($sName)
    {
        $bHasParameter = false;

        foreach ($this->getParameters() as $oParameter) {
            /** @var Parameter $oParameter */
            if ($oParameter->getName() == $sName) {
                $bHasParameter = true;
                break;
            }
        }

        return $bHasParameter;
    }

    /**
     * Get a value of a parameter
     *
     * @param string $sName The name of the parameter
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter
     */
    public function getParameter($sName)
    {
        $mParameter = false;

        foreach ($this->getParameters() as $oParameter) {
            /** @var Parameter $oParameter */
            if ($oParameter->getName() == $sName) {
                $mParameter = $oParameter->getValue();
                break;
            }
        }

        return $mParameter;
    }
}
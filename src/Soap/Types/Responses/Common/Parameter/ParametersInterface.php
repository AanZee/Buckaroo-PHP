<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter;

interface ParametersInterface
{
    /**
     * Get all the parameters
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter[]
     */
    public function getParameters();

    /**
     * Does the parameter exists?
     *
     * @param string $sName The name of the parameter
     *
     * @return boolean
     */
    public function hasParameter($sName);

    /**
     * Get a value of a parameter
     *
     * @param string $sName The name of the parameter
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter
     */
    public function getParameter($sName);
}
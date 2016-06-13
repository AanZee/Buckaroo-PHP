<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter;

interface ParametersInterface
{
    /**
     * Get all the parameters
     *
     * @return Parameter[]
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
     * @return mixed
     */
    public function getParameter($sName);
}
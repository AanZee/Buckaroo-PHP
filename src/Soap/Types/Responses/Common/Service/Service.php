<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service;

use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\ParametersInterface;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\ParametersTrait;

class Service implements ParametersInterface
{
    use ParametersTrait;

    /**
     * The name of the service
     *
     * @var string
     */
    protected $Name;

    /**
     * An array of response parameters
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter[]
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
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter[]
     */
    public function getParameters()
    {
        if ($this->ResponseParameter instanceof Parameter) {
            $this->ResponseParameter = [
                $this->ResponseParameter,
            ];
        }

        return $this->ResponseParameter;
    }
}
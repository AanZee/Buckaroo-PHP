<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter;

class CustomParameters implements ParametersInterface
{
    use ParametersTrait;

    /**
     * The custom parameters
     *
     * @var Parameter[]
     */
    protected $CustomParameter;

    /**
     * Get all the parameters
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter[]
     */
    public function getParameters()
    {
        if ($this->CustomParameter instanceof Parameter) {
            $this->CustomParameter = [
                $this->CustomParameter
            ];
        }

        return $this->CustomParameter;
    }
}
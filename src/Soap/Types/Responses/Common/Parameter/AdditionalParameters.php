<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter;

class AdditionalParameters implements ParametersInterface
{
    use ParametersTrait;

    /**
     * The additional parameters
     *
     * @var Parameter[]
     */
    protected $AdditionalParameters;

    /**
     * Get all the parameters
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\Parameter[]
     */
    public function getParameters()
    {
        if ($this->AdditionalParameters instanceof Parameter) {
            $this->AdditionalParameters = [
                $this->AdditionalParameters
            ];
        }

        return $this->AdditionalParameters;
    }
}
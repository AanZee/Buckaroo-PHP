<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class RequestParameter
{
    protected $ParameterDescription;

    public function setParameterDescription($mParameterDescription)
    {
        if ($mParameterDescription instanceof ParameterDescription) {
            $mParameterDescription = [
                $mParameterDescription
            ];
        }

        $this->ParameterDescription = $mParameterDescription;
    }

    /**
     * @return ParameterDescription[]
     */
    public function getParameterDescriptions()
    {
        return $this->ParameterDescription;
    }
}
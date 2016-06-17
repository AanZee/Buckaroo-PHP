<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class ActionDescription
{
    protected $Name;
    protected $Type;
    protected $Default;
    protected $Description;
    protected $RequestParameters;
    protected $ResponseParameters;

    /**
     * Get the request parameters
     *
     * @return RequestParameter[]
     */
    public function getRequestParameters()
    {
        if (!is_array($this->RequestParameters)) {
            $this->RequestParameters = [
                $this->RequestParameters
            ];
        }

        $aNewRequestParameters = [];
        foreach ($this->RequestParameters as $oRequestParameter) {
            $oNewRequestParameter = new RequestParameter();
            $oNewRequestParameter->setParameterDescription($oRequestParameter->ParameterDescription);
            $aNewRequestParameters[] = $oNewRequestParameter;
        }

        return $aNewRequestParameters;
    }

    /**
     * @param $sParameterName
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ParameterDescription
     */
    public function getRequestParameter($sParameterName)
    {
        $mReturn = false;

        foreach ($this->getRequestParameters() as $oRequestParameter) {
            foreach ($oRequestParameter->getParameterDescriptions() as $oParameterDescription) {
                if ($oParameterDescription->getName() == $sParameterName) {
                    $mReturn = $oParameterDescription;
                    break;
                }
            }
        }

        return $mReturn;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getType()
    {
        return $this->Type;
    }
}
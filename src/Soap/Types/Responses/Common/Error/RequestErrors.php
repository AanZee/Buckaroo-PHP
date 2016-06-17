<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error;

class RequestErrors
{
    const TYPE_SERVICE_ERROR = 'ServiceError';
    const TYPE_ACTION_ERROR = 'ActionError';
    const TYPE_PARAMETER_ERROR = 'ParameterError';
    const TYPE_CUSTOM_PARAMETER_ERROR = 'CustomParameterError';

    /**
     * Optional; Service error
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\Error
     */
    protected $ServiceError;

    /**
     * Optional; Action error
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\Error
     */
    protected $ActionError;

    /**
     * Optional; Parameter error
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\Error
     */
    protected $ParameterError;

    /**
     * Optional; Custom parameter error
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\Error
     */
    protected $CustomParameterError;

    /**
     * Check if there is a certain error present
     *
     * @param string $sErrorType One of the above error types
     *
     * @return bool
     */
    public function hasError($sErrorType)
    {
        return $this->{$sErrorType} !== null;
    }

    /**
     * Get a specific error
     *
     * @param string $sErrorType One of the above error types
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\Error
     */
    public function getError($sErrorType)
    {
        return $this->{$sErrorType};
    }

    /**
     * Get all the present errors
     *
     * @return array
     */
    public function getErrors()
    {
        $aReturn = [];

        if ($this->hasError(self::TYPE_SERVICE_ERROR)) {
            $aReturn[] = $this->getError(self::TYPE_SERVICE_ERROR);
        }
        if ($this->hasError(self::TYPE_ACTION_ERROR)) {
            $aReturn[] = $this->getError(self::TYPE_ACTION_ERROR);
        }
        if ($this->hasError(self::TYPE_PARAMETER_ERROR)) {
            $aReturn[] = $this->getError(self::TYPE_PARAMETER_ERROR);
        }
        if ($this->hasError(self::TYPE_CUSTOM_PARAMETER_ERROR)) {
            $aReturn[] = $this->getError(self::TYPE_CUSTOM_PARAMETER_ERROR);
        }

        return $aReturn;
    }

    /**
     * Check if there are any errors present
     *
     * @return bool
     */
    public function hasErrors()
    {
        return (
            $this->hasError(self::TYPE_SERVICE_ERROR) ||
            $this->hasError(self::TYPE_ACTION_ERROR) ||
            $this->hasError(self::TYPE_PARAMETER_ERROR) ||
            $this->hasError(self::TYPE_CUSTOM_PARAMETER_ERROR)
        );
    }
}

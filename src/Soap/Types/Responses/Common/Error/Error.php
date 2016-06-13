<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error;

class Error
{
    /**
     * The error code
     *
     * @var string
     */
    protected $Error;

    /**
     * The name of the part that has an error
     *
     * @var string
     */
    protected $Name;

    /**
     * Optional; The service in which the error occurred
     *
     * @var string
     */
    protected $Service;

    /**
     * Optional; The action in which the error occurred
     *
     * @var string
     */
    protected $Action;

    /**
     * The description of the error
     *
     * @var mixed
     */
    protected $_;

    /**
     * Get the error code
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->Error;
    }

    /**
     * Get the error name
     *
     * @return string
     */
    public function getErrorName()
    {
        return $this->Name;
    }

    /**
     * Get the error service
     *
     * @return string
     */
    public function getErrorService()
    {
        return ($this->Service !== null ? $this->Service : $this->getName());
    }

    /**
     * Get the error action
     *
     * @return string
     */
    public function getErrorAction()
    {
        return $this->Action;
    }

    /**
     * Get the description
     *
     * @return mixed
     */
    public function getErrorDescription()
    {
        return $this->_;
    }
}
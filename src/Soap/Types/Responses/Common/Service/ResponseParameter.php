<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service;

class ResponseParameter
{
    /**
     * The value of the response parameter
     *
     * @var mixed
     */
    protected $_;

    /**
     * Get the name of the response parameter
     *
     * @var string
     */
    protected $Name;

    /**
     * Get the response parameter name
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get the value of the response parameter
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->_;
    }
}
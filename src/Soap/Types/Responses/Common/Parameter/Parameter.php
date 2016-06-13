<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter;

class Parameter
{
    /**
     * The name of the parameter
     *
     * @var string
     */
    protected $Name;

    /**
     * The value of the parameter
     *
     * @var mixed
     */
    protected $_;

    /**
     * Get the name of the parameter
     * 
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get the value of the parameter
     * 
     * @return mixed
     */
    public function getValue()
    {
        return $this->_;
    }
}
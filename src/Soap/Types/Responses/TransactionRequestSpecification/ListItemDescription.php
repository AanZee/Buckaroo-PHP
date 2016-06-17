<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class ListItemDescription
{
    /**
     * The value of the item
     *
     * @var mixed
     */
    protected $_;

    /**
     * The description of the item
     *
     * @var string
     */
    protected $Description;

    /**
     * Get the value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->_;
    }

    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }
}
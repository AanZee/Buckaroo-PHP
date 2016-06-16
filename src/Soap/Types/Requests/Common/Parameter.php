<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Common;

class Parameter
{
    /**
     * The name of the parameter
     *
     * @var string
     */
    public $Name;

    /**
     * The value of the parameter
     *
     * @var string
     */
    public $_;

    /**
     * The group of the parameter
     *
     * @var null|string
     */
    public $Group;

    /**
     * Parameter constructor.
     *
     * @param string      $sName  The name of the parameter
     * @param string      $mValue The value of the paramter
     * @param string|null $sGroup The group the parameter belongs to
     */
    public function __construct($sName, $mValue, $sGroup = null)
    {
        $this->Name = $sName;
        $this->_ = $mValue;
        $this->Group = $sGroup;
    }
}

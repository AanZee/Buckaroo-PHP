<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Common;

class AdditionalParameter
{
    public $Name;
    public $_;

    public function __construct($sName, $mValue)
    {
        $this->Name = $sName;
        $this->_ = $mValue;
    }
}
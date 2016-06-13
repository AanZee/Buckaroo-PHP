<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Common;

class CustomParameter
{
    public $Name;
    public $_;

    public function __construct($sName, $mValue)
    {
        $this->Name = $sName;
        $this->_ = $mValue;
    }
}
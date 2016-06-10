<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Common;

class RequestParameter
{
 	public $_;
 	public $Name;
 	public $Group;
	
	public function __construct($Name, $Value, $Group = null) {
		$this->Name = $Name;
		$this->_ = $Value;
		$this->Group = $Group;
	}
}

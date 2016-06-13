<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class SecurityType
{
	public $Signature;

	public function __construct()
	{
		$this->Signature = new SignatureType();
	}
}












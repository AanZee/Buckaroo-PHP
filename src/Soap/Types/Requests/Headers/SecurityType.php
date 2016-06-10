<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Headers;

class SecurityType
{
	public $Signature;

	public function __construct()
	{
		$this->Signature = new SignatureType();
	}
}












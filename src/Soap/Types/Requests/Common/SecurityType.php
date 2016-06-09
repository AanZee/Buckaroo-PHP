<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Common;

class SecurityType
{
	public $Signature;

	public function __construct()
	{
		$this->Signature = new SignatureType();
	}
}












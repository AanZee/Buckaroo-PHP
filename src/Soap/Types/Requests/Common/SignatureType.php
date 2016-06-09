<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Common;

class SignatureType
{
	public $SignedInfo;
	public $SignatureValue;
	public $KeyInfo;

	public function __construct()
	{
		$this->SignedInfo = new SignedInfoType();
		$this->SignatureValue = '';
	}
}

<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

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

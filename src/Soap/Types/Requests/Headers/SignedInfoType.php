<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Headers;

class SignedInfoType
{
	public $CanonicalizationMethod;
	public $SignatureMethod;
	public $Reference;
	
	public function __construct() {
		$this->CanonicalizationMethod = new CanonicalizationMethodType();
		$this->SignatureMethod = new SignatureMethodType();
		$this->Reference = [
			new ReferenceType('#_body'),
			new ReferenceType('#_control'),
		];
	}
}

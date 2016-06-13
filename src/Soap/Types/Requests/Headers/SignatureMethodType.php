<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class SignatureMethodType
{
	public $Algorithm;

	public function __construct()
	{
		$this->Algorithm = 'http://www.w3.org/2000/09/xmldsig#rsa-sha1';
	}
}

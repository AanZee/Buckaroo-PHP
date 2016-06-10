<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Headers;

class DigestMethodType
{
	public $Algorithm;

	public function __construct()
	{
		$this->Algorithm = 'http://www.w3.org/2000/09/xmldsig#sha1';
	}
}


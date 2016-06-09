<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Common;

class DigestMethodType
{
	public $Algorithm;

	public function __construct()
	{
		$this->Algorithm = 'http://www.w3.org/2000/09/xmldsig#sha1';
	}
}


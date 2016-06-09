<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Common;

class TransformType
{
	public $Algorithm;

	public function __construct()
	{
		$this->Algorithm = 'http://www.w3.org/2001/10/xml-exc-c14n#';
	}
}

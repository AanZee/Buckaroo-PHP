<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class CanonicalizationMethodType
{
	/**
	 * The canonicalization method type algorithm
	 *
	 * @var string
	 */
	public $Algorithm;

	/**
	 * CanonicalizationMethodType constructor.
	 */
	public function __construct()
	{
		$this->Algorithm = 'http://www.w3.org/2001/10/xml-exc-c14n#';
	}
}


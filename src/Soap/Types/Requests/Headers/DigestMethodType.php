<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class DigestMethodType
{
	/**
	 * The digest method type algorithm
	 * 
	 * @var string
	 */
	public $Algorithm;

	/**
	 * DigestMethodType constructor.
	 */
	public function __construct()
	{
		$this->Algorithm = 'http://www.w3.org/2000/09/xmldsig#sha1';
	}
}


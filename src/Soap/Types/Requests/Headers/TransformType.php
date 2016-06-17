<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class TransformType
{
	/**
	 * The transform type algorithm
	 * 
	 * @var string
	 */
	public $Algorithm;

	/**
	 * TransformType constructor.
	 */
	public function __construct()
	{
		$this->Algorithm = 'http://www.w3.org/2001/10/xml-exc-c14n#';
	}
}

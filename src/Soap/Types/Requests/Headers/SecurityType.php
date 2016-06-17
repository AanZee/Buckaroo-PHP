<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class SecurityType
{
	/**
	 * The signature type
	 * 
	 * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Headers\SignatureType
	 */
	public $Signature;

	/**
	 * SecurityType constructor.
	 */
	public function __construct()
	{
		$this->Signature = new SignatureType();
	}
}












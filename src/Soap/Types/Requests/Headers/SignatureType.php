<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class SignatureType
{
	/**
	 * The signed info
	 *
	 * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Headers\SignedInfoType
	 */
	public $SignedInfo;

	/**
	 * The signature value
	 *
	 * @var string
	 */
	public $SignatureValue;

	/**
	 * The key info
	 *
	 * @var string
	 */
	public $KeyInfo;

	/**
	 * SignatureType constructor.
	 */
	public function __construct()
	{
		$this->SignedInfo = new SignedInfoType();
		$this->SignatureValue = '';
	}
}

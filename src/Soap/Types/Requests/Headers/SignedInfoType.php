<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class SignedInfoType
{
	/**
	 * The Canonicalization method type
	 *
	 * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Headers\CanonicalizationMethodType
	 */
	public $CanonicalizationMethod;

	/**
	 * The signature method type
	 *
	 * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Headers\SignatureMethodType
	 */
	public $SignatureMethod;

	/**
	 * The reference types
	 *
	 * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Headers\ReferenceType[]
	 */
	public $Reference;

	/**
	 * SignedInfoType constructor.
	 */
	public function __construct() {
		$this->CanonicalizationMethod = new CanonicalizationMethodType();
		$this->SignatureMethod = new SignatureMethodType();
		$this->Reference = [
			new ReferenceType('#_body'),
			new ReferenceType('#_control'),
		];
	}
}

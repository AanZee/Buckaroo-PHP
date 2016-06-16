<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class MessageControlBlock
{
	/**
	 * The message control block id
	 * 
	 * @var string
	 */
	public $Id;

	/**
	 * The Buckaroo website key 
	 * 
	 * @var string
	 */
	public $WebsiteKey;

	/**
	 * The culture of the request
	 * 
	 * @var string
	 */
	public $Culture;

	/**
	 * The timestamp of the request
	 * 
	 * @var int
	 */
	public $TimeStamp;

	/**
	 * The channel of the payment, normally Web
	 * 
	 * @var string
	 */
	public $Channel;

	public function __construct()
	{
		$this->Id = '_control';
		$this->TimeStamp = time();
	}
}

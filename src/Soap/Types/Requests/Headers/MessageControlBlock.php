<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Headers;

class MessageControlBlock
{
	public $Id;
	public $WebsiteKey;
	public $Culture;
	public $TimeStamp;
	public $Channel;

	public function __construct()
	{
		$this->Id = '_control';
		$this->TimeStamp = time();
	}
}

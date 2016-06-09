<?php

namespace SeBuDesign\Buckaroo\SOAP\Types\Requests\Common;

class Header
{
	public $MessageControlBlock;
	public $Security;

	public function __construct()
	{
		$this->MessageControlBlock = new MessageControlBlock();
		$this->Security = new SecurityType();
	}
}

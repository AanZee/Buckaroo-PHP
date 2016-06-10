<?php

namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Transaction;

class TransactionService
{
	public $RequestParameter;
	public $Name;
	public $Action;
	public $Version;
	
	public function __construct($Name, $Action, $Version) {
		$this->Name = $Name;
		$this->Action = $Action;
		$this->Version = $Version;
	}
}


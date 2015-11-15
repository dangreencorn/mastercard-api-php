<?php

namespace Mastercard\services\Lost-Stolen\domain;

class AccountInquiry {
    private $AccountNumber;

	public function setAccountNumber($accountnumber) {
		$this->AccountNumber = $accountnumber;
	}
	public function getAccountNumber() {
		return $this->AccountNumber;
	}
}
<?php

namespace Mastercard\services\Lost-Stolen\domain;

class Account {
    private $status;
    private $listed;
    private $reasoncode;
    private $reason;

	public function setStatus($status) {
		$this->status = $status;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setListed($listed) {
		$this->listed = $listed;
	}
	public function getListed() {
		return $this->listed;
	}
	public function setReasonCode($reasoncode) {
		$this->reasoncode = $reasoncode;
	}
	public function getReasonCode() {
		return $this->reasoncode;
	}
	public function setReason($reason) {
		$this->reason = $reason;
	}
	public function getReason() {
		return $this->reason;
	}
}
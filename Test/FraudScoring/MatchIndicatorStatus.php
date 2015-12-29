<?php
namespace Mastercard\Test\FraudScoring;

class MatchIndicatorStatus {
    const SINGLE_TRANSACTION_MATCH = "1";
    const MULTIPLE_TRANS_IDENTICAL_CARD_MATCH = "2";
    const MULTIPLE_TRANS_DIFFERING_CARDS_MATCH = "3";
    const NO_MATCH_FOUND = "4";
} 
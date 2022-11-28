<?php
namespace App\Strategy;
require_once 'paymentStrategy.php';

class payCreditCardStrategy implements paymentStrategy {

    public function pay($amount) {
        return "Credit Card Paid Amount: RM " . $amount;
    }

    public function fromAccount() {
        return "Credit Card Number: ";
    }

}

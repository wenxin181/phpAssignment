<?php
namespace App\Strategy;

class payPaypalStrategy implements paymentStrategy {

    public function pay($amount) {
         return "Paypal Paid Amount: RM " . $amount;
    }

    public function fromAccount() {
        return "PayPal email: ";
    }
}

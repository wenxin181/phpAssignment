<?php
namespace App\Strategy;
interface paymentStrategy {
    public function pay($amount);
    public function fromAccount();
}
